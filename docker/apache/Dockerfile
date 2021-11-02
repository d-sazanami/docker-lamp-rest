FROM 'php:7.4-apache'

RUN apt-get update
RUN set -ex apk --no-cache add postgresql-dev libpq-dev
RUN apt-get install -y vim htop libpq-dev libonig-dev
RUN docker-php-ext-install mbstring pdo_mysql opcache
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./conf/httpd.conf /usr/local/apache2/conf/
COPY ./conf/php.ini /usr/local/etc/php/
COPY ./conf/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN a2enmod rewrite
