FROM php:8.1-apache

COPY app/ /var/www/html/

RUN docker-php-ext-install mysqli

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

RUN a2enmod rewrite
