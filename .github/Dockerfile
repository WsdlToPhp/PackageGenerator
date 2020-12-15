ARG PHP=7.4.10
ARG WSDLTOPHP=3.2.7
ARG PHAR

FROM php:$PHP-cli

ARG PHAR
ARG WSDLTOPHP

LABEL maintainer="https://github.com/mikaelcom" \
      version=$WSDLTOPHP \
      description="This image allows to use the wsdltophp command line tool in order to generate a PHP SDK from any WSDL"

RUN apt-get update \
 && apt-get install -y libxml2-dev tini zip \
 && NPROC="$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1)" \
 && docker-php-ext-install soap

COPY .github/php.ini /usr/local/etc/php/

COPY $PHAR wsdltophp.phar

COPY $PHAR /usr/bin/wsdltophp
COPY .github/docker-entrypoint.sh /
ENTRYPOINT ["sh", "/docker-entrypoint.sh"]
CMD ["wsdltophp"]
