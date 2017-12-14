FROM php:7.1-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y --force-yes wget zip unzip zlib1g-dev bzip2 xz-utils libfontconfig1 libssl-dev libxrender1 libfreetype6-dev libjpeg62-turbo-dev libreadline-dev git -y

RUN docker-php-ext-install pdo zip
RUN docker-php-ext-install pdo_mysql

#RUN pecl install xdebug
#RUN docker-php-ext-enable xdebug

ADD php.ini /usr/local/etc/php/conf.d/

ENV user php
ARG PUID
ARG PGID
RUN groupadd -g $PGID $user && \
    useradd -u $PUID -g $user -m $user

RUN chown -R $user:$user /usr/local/

USER $user

WORKDIR /var/www
