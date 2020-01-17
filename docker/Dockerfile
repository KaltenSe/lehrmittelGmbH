FROM php:7.4.1-apache
WORKDIR /var/www/html

# add php extensions
RUN apt-get update && \
    apt-get install -y libzip-dev zip libpq-dev libonig-dev
RUN docker-php-ext-install pdo_mysql pdo_pgsql zip
RUN apt-get install -y --no-install-recommends libmagickwand-dev
RUN docker-php-ext-configure gd \
        --enable-gd \
        --with-freetype=/usr/include/ \
        --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd
RUN apt-get -y install ghostscript \
    && apt-get install -y libxml2-dev
RUN  docker-php-ext-install soap
RUN pecl install imagick \
    && docker-php-ext-enable imagick
RUN rm -rf /tmp/* /var/cache/apk/* \
    && rm /etc/apt/preferences.d/no-debian-php \
    && docker-php-ext-install opcache
RUN docker-php-ext-install bcmath
RUN docker-php-source delete
#COPY docker/images/base/imagick/policy.xml /etc/ImageMagick-6/policy.xml

# configure php
ENV APACHE_PHP_MEMORY_LIMIT=256M
#ADD docker/images/base/conf/php.ini $PHP_INI_DIR/conf.d/

# pre install packages
#COPY src/vendor /var/www/vendor
#COPY src/vendor-prod /var/www/vendor-prod
#RUN ls -lisa /var/www/vendor-prod
COPY ./src /var/www/html
RUN chown www-data:www-data -R /var/www/html
# configure apache webserver
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod -q rewrite actions
