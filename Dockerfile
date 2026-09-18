# syntax=docker/dockerfile:1
# SIPANDA — Laravel 13 + PHP 8.3 + Nginx + PHP-FPM, multi-stage (cepat & ramping).
# Satu image berisi Nginx + PHP-FPM yang dijalankan via Supervisor.
# Build  : docker compose build
# Run    : docker compose --env-file .env.docker up -d --build

ARG PHP_VERSION=8.3
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
FROM composer:${COMPOSER_VERSION}-php8.3 AS vendor
WORKDIR /app
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
RUN apt-get update && apt-get install -y --no-install-recommends \
      curl nginx supervisor \
      libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
      libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" \
      pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache \
    && apt-get purge -y --auto-remove \
      libpng-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
      libfreetype6-dev libjpeg62-turbo-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

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
RUN php artisan package:discover --ansi --no-interaction \
 && php artisan view:clear --no-interaction \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 \
  CMD curl -fsS http://localhost/up || exit 1

ENTRYPOINT ["entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
