#!/bin/bash

# Instalar dependencias
composer install --no-dev --optimize-autoloader
npm install

# Construir assets
npm run build

# Ejecutar migraciones
php artisan migrate --force

# Ejecutar seeders
php artisan db:seed --force

# Limpiar cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
