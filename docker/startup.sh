#!/bin/sh

# Clear and cache Laravel config
echo "Caching Laravel config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations automatically if database is connected
if [ -n "$DB_CONNECTION" ] && [ "$DB_CONNECTION" != "sqlite" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Start PHP-FPM in background
echo "Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground
echo "Starting Nginx..."
nginx -g "daemon off;"
