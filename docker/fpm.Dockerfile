FROM php:8.2-fpm-alpine

# Копируем конфигурацию PHP
COPY docker/conf/php.ini /usr/local/etc/php/conf.d/php.ini

# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo pdo_mysql bcmath

# Устанавливаем расширение intl
RUN apk --no-cache add icu-dev \
    && docker-php-ext-install intl
