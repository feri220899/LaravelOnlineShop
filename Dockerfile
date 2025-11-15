# =========================
# STAGE 1: Composer (build vendor)
# =========================
FROM composer:latest-php8.0 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress \
    --ignore-platform-req=ext-gd

# =========================
# STAGE 2: PHP-FPM runtime (Laravel)
# =========================
FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_pgsql mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

COPY --from=vendor /app/vendor ./vendor

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
