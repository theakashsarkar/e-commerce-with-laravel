FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd && \ 
    rm -rf /var/lib/apt/lists/*

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN chown -R www-data:www-data /var/www

COPY default.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/app


CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80