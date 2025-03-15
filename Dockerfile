FROM php:8.3-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install dependencies
RUN composer install
RUN composer dump-autoload

EXPOSE 80