#!/bin/bash

composer install
php artisan config:cache
yes | php artisan migrate
composer require doctrine/dbal 
php artisan db:seed --class=Database\\\Seeders\\\DemoDataSeeder
