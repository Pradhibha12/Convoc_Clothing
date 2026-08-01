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

    # Sync SQLite data to PostgreSQL if PostgreSQL has no users
    echo "Checking if database needs synchronization..."
    USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::count();")
    if [ "$USER_COUNT" = "0" ] || [ -z "$USER_COUNT" ]; then
        echo "PostgreSQL database is empty. Syncing local SQLite data..."
        php artisan db:seed --class="Database\Seeders\SqliteToPgsqlSeeder" --force
    else
        echo "Database already populated. Skipping sync."
    fi
fi

# Start PHP-FPM in background
echo "Starting PHP-FPM..."
php-fpm -D

# Start Nginx in foreground
echo "Starting Nginx..."
nginx -g "daemon off;"
