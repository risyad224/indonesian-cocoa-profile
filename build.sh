#!/bin/bash

# Vercel Build Script for Laravel + Vite
set -e

echo "Building Indonesian Cocoa Profile..."

# Install Node dependencies
npm ci --prefer-offline --no-audit

# Build frontend assets with Vite
npm run build

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Clear Laravel cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Build Laravel config cache
php artisan config:cache
php artisan route:cache

echo "✓ Build completed successfully"
