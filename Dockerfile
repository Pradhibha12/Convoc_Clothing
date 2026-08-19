FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    libzip-dev \
    unzip \
    git \
    curl \
    oniguruma-dev \
    libxml2-dev \
    postgresql-dev \
    sqlite-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql pdo_sqlite mbstring exif pcntl bcmath gd zip xml

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Run composer install
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configure Nginx
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Make startup script executable
RUN chmod +x docker/startup.sh

# Expose port
EXPOSE 80

# Run entrypoint
ENTRYPOINT ["sh", "docker/startup.sh"]
