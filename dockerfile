FROM php:8.2-apache
WORKDIR /var/www/html
COPY  ./web ./
RUN docker-php-ext-install pdo pdo_mysql mysqli
USER www-data
CMD ["apache2-foreground"]  