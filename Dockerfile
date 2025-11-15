# =========================
# STAGE 1: Composer (build vendor)
# =========================
FROM composer:2 AS vendor

WORKDIR /app

# Copy file composer
COPY composer.json composer.lock ./

# Install dependency PHP (tanpa dev)
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress

# =========================
# STAGE 2: PHP-FPM runtime
# =========================
FROM php:8.2-fpm

# Install paket OS yang dibutuhkan extension PHP
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

# Copy seluruh source code Laravel ke image
COPY . .

# Copy folder vendor hasil build di stage 1
COPY --from=vendor /app/vendor ./vendor

# Optional: kalau kamu sudah punya .env.production di repo,
# bisa di-copy ke .env:
# COPY .env.production .env

# Permission storage & bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose port FPM
EXPOSE 9000

CMD ["php-fpm"]
