FROM php:8.0-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libpq-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd
RUN docker-php-ext-install pdo pdo_pgsql mbstring tokenizer zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --prefer-dist

EXPOSE 9000

CMD ["php-fpm"]