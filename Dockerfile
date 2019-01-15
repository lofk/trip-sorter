FROM php:7.3-apache

COPY ./ /var/www/html

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer \
    && chmod +x /usr/bin/composer

RUN composer install