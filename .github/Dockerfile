ARG PHP=7.4.10
ARG WSDLTOPHP=3.2.7

FROM php:$PHP-cli

ARG WSDLTOPHP
ARG PHP

RUN apt-get update && apt-get install -y libxml2-dev && docker-php-ext-install -j$(nproc) soap

ADD https://github.com/WsdlToPhp/PackageGenerator/releases/download/$WSDLTOPHP/wsdltophp-$WSDLTOPHP-$PHP.phar wsdltophp.phar

RUN chmod +x wsdltophp.phar

ENTRYPOINT /wsdltophp.phar
