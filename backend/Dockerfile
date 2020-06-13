FROM php:7.4-apache

RUN apt-get update \
	&& apt-get install -y \
	git

COPY .docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# install xdebug
RUN pecl install xdebug
COPY .docker/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN docker-php-ext-enable xdebug