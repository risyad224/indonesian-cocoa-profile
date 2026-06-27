#!/bin/bash

# Vercel Build Script for Laravel + Vite
set -e

echo "Building Indonesian Cocoa Profile..."

# Install Node dependencies
npm install --prefer-offline --no-audit

# Build frontend assets with Vite
npm run build

# Install PHP dependencies is handled automatically by vercel-php runtime

echo "✓ Build completed successfully"
