#!/bin/bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
php artisan config:cache
php artisan route:cache
php artisan view:cache