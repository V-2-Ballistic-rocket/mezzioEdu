FROM php:7.4-fpm-alpine

RUN apk update && apk upgrade && \
    apk add --no-cache icu-dev postgresql-dev libzip-dev g++ make && \
    docker-php-ext-configure intl && \
    docker-php-ext-install pdo_pgsql pgsql zip intl && \
    rm -rf /var/cache/apk/* && rm -rf /tmp/*

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS && \
    pecl install redis && docker-php-ext-enable redis

RUN apk add --update linux-headers

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /app