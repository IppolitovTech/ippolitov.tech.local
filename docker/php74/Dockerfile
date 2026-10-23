FROM php:7.4-apache

# pdo_mysql собирается без системных библиотек, apt не нужен
RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf \
    && usermod -u 1000 www-data && groupmod -g 1000 www-data
