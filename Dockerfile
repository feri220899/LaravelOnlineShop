# =========================
# PHP-FPM untuk DEVELOPMENT
# =========================
FROM php:8.0-fpm

# Install package OS yang dibutuhkan extension PHP
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
    vim \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo_pgsql mbstring zip \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

RUN chown -R www-data:www-data /app

EXPOSE 9000

CMD ["php-fpm"]
