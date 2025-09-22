#!/bin/bash
set -e

# Setup spécifique GitHub Codespace
echo "🚀 Configuration BiblioTech pour GitHub Codespace..."

cd /workspace

# Configuration .env pour Codespace
if [ ! -f .env ]; then
    cp .env.example .env
    sed -i "s|APP_URL=.*|APP_URL=https://${CODESPACE_NAME}-8000.app.github.dev|" .env
    sed -i 's|DB_HOST=.*|DB_HOST=database|' .env
    echo "✅ Fichier .env configuré pour Codespace"
fi

# Installation Composer
if [ ! -d vendor ]; then
    echo "📦 Installation Composer..."
    composer install --no-interaction --optimize-autoloader
fi

# Installation NPM
if [ ! -d node_modules ]; then
    echo "📦 Installation NPM..."
    npm install --silent
fi

# Génération clé Laravel
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Génération clé Laravel..."
    php artisan key:generate --no-interaction
fi

# Build assets
echo "🎨 Build assets..."
npm run build --silent

# Permissions
chmod -R 775 storage bootstrap/cache

# Liens et cache
php artisan storage:link --no-interaction
php artisan config:cache
php artisan route:cache

echo "✅ BiblioTech configuré pour Codespace !"
