FROM php:rc-cli
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

# Disable for PHP7.4-alpha3 BC https://github.com/php/php-src/commit/48ca5a1e176c5301fedd1bc4f661969d6f9a49eb#diff-8095b324074c088b219f0af3b0678cc3L1716
# RUN pecl install ast
# RUN docker-php-ext-enable ast

RUN pecl install apcu-${APCU_VERSION}
RUN docker-php-ext-enable apcu opcache

RUN groupmod -g 80 dialout \
    && mkdir -p /var/app

CMD ["/bin/bash", "-c"]
