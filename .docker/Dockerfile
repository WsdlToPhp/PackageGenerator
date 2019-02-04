FROM splitbrain/phpfarm:jessie

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /var/www/

WORKDIR /var/www/