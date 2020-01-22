#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-api}
env=${APP_ENV:-local}

echo "env=$env"

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache)

    echo "Removing Xdebug..."
    rm -rf /usr/local/etc/php/conf.d/{docker-php-ext-xdebug,xdebug}.ini
fi

exec apache2-foreground
