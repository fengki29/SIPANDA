# syntax=docker/dockerfile:1
# SIPANDA — Laravel 13 + PHP 8.4 + Nginx + PHP-FPM, multi-stage (cepat & ramping).
# Satu image berisi Nginx + PHP-FPM yang dijalankan via Supervisor.
# Build  : docker compose build
# Run    : docker compose --env-file .env.docker up -d --build

ARG PHP_VERSION=8.4
ARG NODE_VERSION=20
ARG COMPOSER_VERSION=2

# ---------- Stage 1: build Vite assets ----------
FROM node:${NODE_VERSION}-alpine AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN --mount=type=cache,target=/root/.npm npm ci --ignore-scripts --no-audit --no-fund
COPY resources ./resources
COPY vite.config.js postcss.config.js tailwind.config.js ./
RUN npm run build

# ---------- Stage 2: install PHP deps (tanpa dev) ----------
# NOTE: image resmi composer tidak punya varian "-php8.4" (tag valid: 2, 2.10, latest, ...).
# Pakai php:8.4-cli + binary composer agar platform check sesuai lock file
# (Symfony 8.1 butuh PHP >= 8.4.1). JANGAN pakai --ignore-platform-reqs:
# check ini yang menangkap ketidakcocokan versi PHP sejak awal.
FROM composer:${COMPOSER_VERSION} AS composer
FROM php:${PHP_VERSION}-cli-bookworm AS vendor
COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/tmp/composer \
    COMPOSER_CACHE_DIR=/tmp/cache/composer
WORKDIR /app
# SENGAJA tanpa "apt-get purge --auto-remove": pola itu menghapus runtime libs
# (libpng, libjpeg, libzip, libicu, ...) sehingga gd.so/zip.so/intl.so gagal
# load ("Unable to load dynamic library") dan composer menolak lock file.
# Stage ini dibuang setelah build (hanya /app/vendor yang disalin), jadi
# tidak perlu dirampingkan — yang penting ekstensi benar-benar load.
RUN apt-get update && apt-get install -y --no-install-recommends \
      git unzip \
      libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev zlib1g-dev \
      libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
      pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache \
    && php -m | grep -Ei '^(gd|zip|intl|pdo_mysql)$' \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && mkdir -p /tmp/cache/composer
COPY composer.json composer.lock ./
RUN --mount=type=cache,target=/tmp/cache/composer \
    composer install \
      --no-dev --no-interaction --no-plugins --no-scripts \
      --prefer-dist --optimize-autoloader

# ---------- Stage 3: runtime Nginx + PHP-FPM ----------
FROM php:${PHP_VERSION}-fpm-bookworm AS runtime

ENV DEBIAN_FRONTEND=noninteractive \
    COMPOSER_ALLOW_SUPERUSER=1

# Nginx + Supervisor + ekstensi PHP untuk Laravel + maatwebsite/excel + dompdf.
# Pola apt-mark: hanya paket -dev yang dibuang; runtime libs hasil kompilasi
# (libpng, libjpeg, libzip, libicu, ...) ditandai manual agar tidak ikut
# ter-autoremove (kalau ikut terhapus, gd.so/zip.so/intl.so gagal load).
RUN set -eux; \
    savedAptMark="$(apt-mark showmanual)"; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
      curl nginx supervisor \
      libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
      libfreetype6-dev libjpeg62-turbo-dev \
    ; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" \
      pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache; \
    php -m | grep -Ei '^(gd|zip|intl|pdo_mysql)$'; \
    apt-mark auto '.*' > /dev/null; \
    apt-mark manual $savedAptMark curl nginx supervisor; \
    find /usr/local -type f -executable -exec ldd '{}' ';' \
      | awk '/=>/ { so = $(NF-1); if (index(so, "/usr/local/") == 1) { next }; gsub("^/(usr/)?", "", so); print "so:" so }' \
      | sort -u \
      | xargs -r dpkg-query --search \
      | cut -d: -f1 \
      | sort -u \
      | xargs -r apt-mark manual; \
    apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# php.ini produksi + OPcache.
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/php/opcache.ini "$PHP_INI_DIR/conf.d/99-opcache.ini"

# Nginx vhost Laravel + Supervisor (Nginx + PHP-FPM dalam satu container).
COPY docker/nginx/default.conf /etc/nginx/sites-available/default
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www/html

# Salin kode + hasil build (urutan ini memaksimalkan layer cache).
COPY composer.json composer.lock artisan ./
COPY --from=vendor /app/vendor ./vendor
COPY . .
COPY --from=frontend /app/public/build ./public/build

# Dummy key agar artisan bisa jalan saat build tanpa .env asli.
ARG APP_KEY="base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA="
ENV APP_KEY=${APP_KEY}
# Hapus cache bootstrap basi dari konteks (kalau ada), lalu regenerate.
RUN rm -f bootstrap/cache/*.php \
 && php artisan package:discover --ansi --no-interaction \
 && php artisan view:clear --no-interaction \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN sed -i 's/\r$//' /usr/local/bin/entrypoint.sh \
 && chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
  CMD curl -fsS http://localhost/up || exit 1

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
