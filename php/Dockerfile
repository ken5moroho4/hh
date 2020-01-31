FROM php:7.2-fpm

RUN docker-php-ext-install pdo_mysql mysqli mbstring

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

COPY php.ini /usr/local/etc/php/