FROM php:rc-cli-alpine3.10
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV APCU_VERSION 5.1.17

RUN apk add gosu --update --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted \
    && apk add --no-cache --virtual .global ca-certificates git wget \
    && apk add --no-cache --virtual .zip-deps unzip libzip-dev zlib-dev \
    && apk add --no-cache --virtual .intl-deps icu-libs icu-dev \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS

RUN pecl install apcu-${APCU_VERSION} ast
RUN docker-php-ext-install intl zip
RUN docker-php-ext-enable apcu opcache ast

RUN addgroup bar && \
    adduser -D -h /home -s /bin/sh -G bar foo

CMD ["/bin/bash", "-c"]
