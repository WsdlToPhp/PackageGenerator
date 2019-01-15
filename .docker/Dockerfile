FROM php:7.2-apache

RUN apt-get update \
    && apt-get install -y libxml2-dev git zip zlib1g \
    && docker-php-ext-install soap

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /var/www/html

WORKDIR /var/www/html