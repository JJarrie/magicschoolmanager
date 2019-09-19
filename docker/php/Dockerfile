FROM php:rc-fpm-alpine3.10
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV APCU_VERSION 5.1.17

RUN apk add --no-cache --virtual .global ca-certificates git wget \
    && apk add --no-cache --virtual .zip-deps unzip libzip-dev zlib-dev \
    && apk add --no-cache --virtual .intl-deps icu-libs icu-dev \
    && apk add --no-cache --virtual .postgres postgresql-dev \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS

RUN docker-php-ext-install intl zip \
    && pecl install apcu-${APCU_VERSION}

RUN apk del .build-deps

RUN docker-php-ext-enable apcu opcache
RUN docker-php-ext-install pdo_pgsql

# Disable for PHP7.4 No-support
# ENV current_os=alpine
# RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
#     && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/$current_os/amd64/$version \
#     && mkdir -p /tmp/blackfire \
#     && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp/blackfire \
#     && mv /tmp/blackfire/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
#     && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > $PHP_INI_DIR/conf.d/blackfire.ini \
#     && rm -rf /tmp/blackfire /tmp/blackfire-probe.tar.gz

RUN apk add gosu --update --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/testing/ --allow-untrusted && \
    addgroup bar && \
    adduser -D -h /home -s /bin/sh -G bar foo

COPY entrypoint.sh /entrypoint

ENTRYPOINT ["/entrypoint"]
