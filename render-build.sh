#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies if package.json exists
if [ -f "package.json" ]; then
    npm ci
    npm run build
fi

# Create SQLite database file if it doesn't exist
touch database/database.sqlite

# Run database migrations
php artisan migrate --force

# Create sessions table (since you're using database sessions)
php artisan session:table || true
php artisan migrate --force

# Clear and cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
chmod -R 775 storage bootstrap/cache