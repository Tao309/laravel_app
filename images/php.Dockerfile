FROM php:7.3-fpm
MAINTAINER Tao309 <tao309@mail.ru>

RUN apt-get update && apt-get install -y \
        curl \
        git \
        zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

CMD ["php-fpm"]