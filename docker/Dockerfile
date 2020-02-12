## Pull Image
FROM php:7.3-apache

## update and install
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y 
RUN apt-get install vim -y
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN apt-get install -y --no-install-recommends libmagickwand-dev \
    && docker-php-ext-configure gd \
        --with-gd \
        #--with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && apt-get -y install ghostscript \
    && apt-get install -y libxml2-dev \
    && docker-php-ext-install mbstring \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && rm -rf /tmp/* /var/cache/apk/* \
    && apt-get install -y wget \
    && apt-get update && apt-get install -y pkg-config patch \
    && docker-php-ext-install pdo pdo_mysql 

## Install ZIP
RUN apt-get install -y \
     zlib1g-dev \
      libzip-dev
RUN docker-php-ext-install zip


# get composer
RUN wget https://composer.github.io/installer.sig -O - -q | tr -d '\n' > installer.sig \
  && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php -r "if (hash_file('SHA384', 'composer-setup.php') === file_get_contents('installer.sig')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php'); unlink('installer.sig');" \
  && cp composer.phar /usr/local/bin/composer

# decide if xDebug should be deleted
COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod 777 /usr/local/bin/entrypoint

# configure apache webserver
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite
RUN a2enmod actions

# Copy source code
COPY ./src /var/www/html

## Set workDir
WORKDIR /var/www/html

# install composer
RUN composer install

## change permissons on the working folder
RUN chown -R www-data:www-data /var/www/html

RUN composer dump-autoload

# run command
CMD ["/usr/local/bin/entrypoint"]


