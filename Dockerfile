# =========================
# STAGE 1: Composer (build vendor)
# =========================
FROM php:8.0-cli AS vendor

WORKDIR /app

COPY composer.json composer.lock ./


# =========================
# STAGE 2: PHP-FPM runtime (Laravel)
# =========================
FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
 && pdo pdo_pgsql zip

WORKDIR /app

COPY . .

COPY --from=vendor /app/vendor ./vendor

RUN composer install

RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
