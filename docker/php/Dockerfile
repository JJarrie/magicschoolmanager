FROM php:fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV APCU_VERSION 5.1.17

RUN apk add --no-cache --virtual .global ca-certificates git \
    && apk add --no-cache --virtual .zip-deps unzip libzip-dev zlib-dev \
    && apk add --no-cache --virtual .intl-deps icu-libs icu-dev \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS

RUN pecl install ast
RUN docker-php-ext-enable ast

RUN docker-php-ext-install intl zip \
    && pecl install apcu-${APCU_VERSION}

RUN apk del .build-deps

RUN docker-php-ext-enable apcu opcache
RUN docker-php-ext-install pdo_mysql

RUN apk add gosu --update --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted && \
    addgroup bar && \
    adduser -D -h /home -s /bin/sh -G bar foo

COPY entrypoint.sh /entrypoint

ENTRYPOINT ["/entrypoint"]
