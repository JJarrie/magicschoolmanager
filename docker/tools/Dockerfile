FROM php:7.3-cli
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV APCU_VERSION 5.1.17

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       zip \
       unzip \
       git \
       libzip-dev \
       wget \
       libicu-dev \
    && docker-php-ext-install opcache zip intl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install ast
RUN docker-php-ext-enable ast
RUN pecl install apcu-${APCU_VERSION}
RUN docker-php-ext-enable apcu opcache

RUN groupmod -g 80 dialout \
    && mkdir -p /var/app

CMD ["/bin/bash", "-c"]
