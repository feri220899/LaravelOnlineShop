# =========================
# STAGE 1: Composer (build vendor)
# =========================
FROM composer:2 AS vendor
# (lebih aman pakai composer:2 daripada latest, biar ga tiba-tiba lompat versi PHP)

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer update && composer install --optimize-autoloader


# =========================
# STAGE 2: PHP-FPM runtime (Laravel)
# =========================
FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_pgsql

WORKDIR /app

COPY . .

COPY --from=vendor /app/vendor ./vendor

RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
