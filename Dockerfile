FROM php:7.3-apache

COPY src/ /var/www/html

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer \
    && chmod +x /usr/bin/composer

