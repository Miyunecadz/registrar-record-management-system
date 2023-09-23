#!/bin/bash

# Install composer dependencies && setup app
if [ ! -d "vendor" ] && [ -f "composer.json" ] && [ "$APP_ENV" == "production" ]; then
    composer config --global process-timeout 6000
    composer install
    composer dump-autoload

    php artisan key:generate
fi

# Install npm dependencies
if [ ! -d "node_modules" ] && [ -f "package.json" ] && [ "$APP_ENV" == "production" ]; then
    yarn add vite
    yarn install
    yarn build
fi
# Run apache foreground
apachectl -D FOREGROUND