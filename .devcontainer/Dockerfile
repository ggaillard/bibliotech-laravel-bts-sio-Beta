# Image de base officielle Microsoft pour Codespace avec PHP
FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

# Métadonnées
LABEL maintainer="Formation Laravel BTS SIO SLAM"
LABEL description="Image Docker Codespace pour BiblioTech - Séance 1"
LABEL version="1.0"

# Variables d'environnement
ENV DEBIAN_FRONTEND=noninteractive
ENV APACHE_DOCUMENT_ROOT=/workspace/public
ENV APACHE_RUN_USER=vscode
ENV APACHE_RUN_GROUP=vscode

# Installation des dépendances système requises
RUN apt-get update && apt-get install -y \
    # Extensions PHP essentielles
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    # Outils de développement
    git \
    curl \
    wget \
    vim \
    nano \
    unzip \
    zip \
    # PostgreSQL client
    postgresql-client \
    # Nettoyage
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installation des extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_pgsql \
        pgsql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        xml \
        curl \
        fileinfo \
        json \
        tokenizer

# Installation de Composer (version officielle)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installation de Node.js 18 LTS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Configuration d'Apache pour Laravel
RUN a2enmod rewrite headers
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Configuration PHP pour développement
RUN echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "upload_max_filesize = 32M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size = 32M" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/custom.ini

# Création du répertoire de travail
WORKDIR /workspace

# Configuration des permissions pour vscode
RUN chown -R vscode:vscode /var/www \
    && chown -R vscode:vscode /etc/apache2 \
    && chown -R vscode:vscode /var/run/apache2 \
    && chown -R vscode:vscode /var/lock/apache2 \
    && chown -R vscode:vscode /var/log/apache2

# Scripts d'aide pour le développement
COPY setup.sh /usr/local/bin/setup-bibliotech
COPY start.sh /usr/local/bin/start-bibliotech
RUN chmod +x /usr/local/bin/setup-bibliotech \
    && chmod +x /usr/local/bin/start-bibliotech

# Configuration pour l'utilisateur vscode
USER vscode

# Installation globale d'outils npm utiles
RUN npm install -g @vue/cli vite nodemon

# Retour à l'utilisateur root pour les dernières configurations
USER root

# Configuration finale Apache
RUN sed -i 's|/var/www/html|/workspace/public|g' /etc/apache2/sites-available/000-default.conf

# Exposition des ports
EXPOSE 8000

# Point d'entrée par défaut (pour Codespace)
CMD ["sleep", "infinity"]