#!/bin/bash
set -e

# Create SQLite file if using SQLite
if [ "${DB_CONNECTION:-sqlite}" = "sqlite" ]; then
  DB_PATH="${DB_DATABASE:-database/database.sqlite}"
  mkdir -p "$(dirname "$DB_PATH")"
  touch "$DB_PATH"
fi

# Run migrations
php artisan migrate --force

# Seed if projects table is empty
COUNT=$(php artisan tinker --execute="echo App\Models\Project::count();" 2>/dev/null | tail -1)
if [ "$COUNT" = "0" ] || [ -z "$COUNT" ]; then
  php artisan db:seed --class=ProjectSeeder --force
fi

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start server
php -S 0.0.0.0:${PORT:-8000} -t public
