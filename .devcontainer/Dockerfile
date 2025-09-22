# Dockerfile pour GitHub Codespace
# Image optimisée pour développement

FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

# Extensions PHP pour Laravel
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    postgresql-client \
    && docker-php-ext-install pdo_pgsql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configuration pour développement
RUN echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/custom.ini

# Répertoire de travail
WORKDIR /workspace

# Utilisateur vscode (par défaut pour Codespace)
USER vscode
