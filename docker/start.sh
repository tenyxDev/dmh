#!/usr/bin/env bash

echo "start shell"

set -e

role=${CONTAINER_ROLE:-queue}
env=${APP_ENV:-production}

echo "$role"
echo "$env"

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www/html && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi

if [ "$role" = "app" ]; then

    echo "app role"

elif [ "$role" = "queue" ]; then

    echo "Queue role"
    php /var/www/html/artisan queue:work --verbose --tries=3 --timeout=90
    exit 1

elif [ "$role" = "scheduler" ]; then

    echo "Scheduler role"
    php /var/www/html/artisan schedule:run --verbose --no-interaction &
    exit 1

else
    echo "Could not match the container role \"$role\""
    exit 1
fi
