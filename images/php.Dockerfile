FROM php:7.3-fpm
MAINTAINER Tao309 <tao309@mail.ru>

RUN apt-get update && apt-get install -y \
        curl \
        git \
        zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y curl \
  && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
  && apt-get install -y nodejs \
  && curl -L https://www.npmjs.com/install.sh | sh

RUN docker-php-ext-install pdo pdo_mysql

RUN chown www-data:www-data -R /var/www;
RUN chmod 777 -R /var/www/storage;

WORKDIR /var/www

CMD ["php-fpm"]