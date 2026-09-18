#!/bin/sh
set -eu

# Tunggu MySQL siap (maks ~60 dtk), lalu migrate + cache + jalankan Supervisor (Nginx + PHP-FPM).
DB_HOST="${DB_HOST:-db}"
DB_PORT="${DB_PORT:-3306}"

i=0
until php -r '$c = @fsockopen(getenv("DB_HOST") ?: "db", (int) (getenv("DB_PORT") ?: 3306), $e, $s, 2); if ($c) { fclose($c); exit(0); } exit(1);' \
  >/dev/null 2>&1 || [ "$i" -ge 30 ]; do
  i=$((i + 1))
  echo "Menunggu database ${DB_HOST}:${DB_PORT}... (${i}/30)"
  sleep 2
done

mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

php artisan storage:link --no-interaction || true
php artisan migrate --force --no-interaction

if [ "${APP_ENV:-production}" = "production" ]; then
  php artisan optimize --no-interaction
else
  php artisan config:clear --no-interaction || true
  php artisan route:clear --no-interaction || true
  php artisan view:clear --no-interaction || true
fi

exec "$@"
