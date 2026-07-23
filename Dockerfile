# syntax=docker/dockerfile:1

FROM php:8.3-fpm-alpine AS build

RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    nodejs \
    npm \
    icu-dev \
    libzip-dev \
    libxml2-dev \
    oniguruma-dev \
    mariadb-dev \
    build-base \
  && docker-php-ext-install intl pdo_mysql xml zip \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.lock composer.json .
COPY artisan .
COPY bootstrap ./bootstrap
RUN composer install --prefer-dist --no-interaction --optimize-autoloader

COPY package.json .
RUN npm install

COPY . .
RUN npm run build \
  && rm -rf node_modules npm-debug.log \
  && composer dump-autoload --optimize

FROM php:8.3-fpm-alpine AS runtime

RUN apk add --no-cache \
    icu-dev \
    libzip-dev \
    libxml2-dev \
    oniguruma-dev \
    mariadb-dev \
    zip \
  && docker-php-ext-install intl pdo_mysql xml zip

WORKDIR /var/www/html
COPY --from=build /var/www/html /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
