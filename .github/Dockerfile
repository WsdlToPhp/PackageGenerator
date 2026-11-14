ARG PHP=7.4
ARG WSDLTOPHP=3.2.7
ARG PHAR

FROM debian:trixie-slim

ARG PHP
ARG PHAR
ARG WSDLTOPHP

ENV DEBIAN_FRONTEND=noninteractive

LABEL maintainer="https://github.com/mikaelcom" \
      version=$WSDLTOPHP \
      description="This image allows to use the wsdltophp command line tool in order to generate a PHP SDK from any WSDL"

RUN apt-get update \
 && apt-get install -y --no-install-recommends ca-certificates curl lsb-release tini zip \
 && curl -fsSL https://packages.sury.org/php/apt.gpg -o /usr/share/keyrings/deb.sury.org-php.gpg \
 && echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
 && apt-get update \
 && apt-get install -y --no-install-recommends "php${PHP}-cli" "php${PHP}-soap" \
 && rm -rf /var/lib/apt/lists/*

COPY .github/php.ini /etc/php/${PHP}/cli/conf.d/99-wsdltophp.ini

COPY $PHAR wsdltophp.phar

COPY $PHAR /usr/bin/wsdltophp
COPY .github/docker-entrypoint.sh /
ENTRYPOINT ["sh", "/docker-entrypoint.sh"]
CMD ["wsdltophp"]
