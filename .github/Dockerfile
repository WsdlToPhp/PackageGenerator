ARG PHP=7.4.10
ARG WSDLTOPHP=3.2.7
ARG PHAR=https://github.com/WsdlToPhp/PackageGenerator/releases/download/$WSDLTOPHP/wsdltophp-$WSDLTOPHP-$PHP.phar

FROM php:$PHP-cli

RUN apt-get update \
 && apt-get install -y libxml2-dev \
 && NPROC="$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1)" \
 && docker-php-ext-install soap

ADD $PHAR wsdltophp

RUN chmod +x wsdltophp

ENTRYPOINT /wsdltophp
