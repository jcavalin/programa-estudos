FROM php:7.4-apache

RUN apt-get update \
	&& apt-get install -y \
	git

COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY .docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini