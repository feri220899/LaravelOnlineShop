# =========================
# STAGE 1: Composer (build vendor)
# =========================
FROM composer:2 AS vendor
# (lebih aman pakai composer:2 daripada latest, biar ga tiba-tiba lompat versi PHP)

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install


# =========================
# STAGE 2: PHP-FPM runtime (Laravel)
# =========================
FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
 && docker-php-ext-install pdo pdo_pgsql zip

WORKDIR /app

COPY . .

COPY --from=vendor /app/vendor ./vendor

RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
