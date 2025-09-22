# Dockerfile pour Installation Locale
# Image complète avec tous les outils

FROM php:8.2-cli

# Variables d'environnement
ENV DEBIAN_FRONTEND=noninteractive

# Installation dépendances système
RUN apt-get update && apt-get install -y \
    # Extensions PHP
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    # Outils
    curl \
    git \
    unzip \
    postgresql-client \
    # Nettoyage
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Extensions PHP pour Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_pgsql \
        pgsql \
        zip \
        gd \
        bcmath \
        pcntl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Node.js 18 LTS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Configuration PHP pour développement
RUN echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "upload_max_filesize = 32M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size = 32M" >> /usr/local/etc/php/conf.d/custom.ini

# Répertoire de travail
WORKDIR /var/www/html

# Script d'entrée
COPY docker/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Utilisateur non-root pour sécurité
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -g appuser -m appuser
USER appuser

EXPOSE 8000

ENTRYPOINT ["docker-entrypoint.sh"]
