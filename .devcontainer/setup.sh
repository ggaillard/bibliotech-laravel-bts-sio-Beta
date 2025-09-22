#!/bin/bash
set -e

# ===============================================
# Setup BiblioTech - Séance 1 : Fondations Laravel + Docker
# Services essentiels : Laravel + PostgreSQL + MailHog
# ===============================================

# Couleurs et émojis
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'
SUCCESS="✅"
ERROR="❌"
WARNING="⚠️"
INFO="ℹ️"
ROCKET="🚀"

# Header
echo ""
echo -e "${BLUE}╔════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║  ${ROCKET} BiblioTech Setup - Séance 1                ║${NC}"
echo -e "${BLUE}║  Fondations Laravel + Docker                  ║${NC}"
echo -e "${BLUE}║  Services : Laravel + PostgreSQL + MailHog    ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════════════╝${NC}"
echo ""

# Fonctions utiles
log_step() {
    echo -e "$(date '+%H:%M:%S') ${BLUE}${1}${NC}"
}

log_success() {
    echo -e "$(date '+%H:%M:%S') ${GREEN}${SUCCESS} ${1}${NC}"
}

log_warning() {
    echo -e "$(date '+%H:%M:%S') ${YELLOW}${WARNING} ${1}${NC}"
}

log_error() {
    echo -e "$(date '+%H:%M:%S') ${RED}${ERROR} ${1}${NC}"
}

# Détecter l'environnement
if [ -n "$CODESPACE_NAME" ]; then
    ENVIRONMENT="codespace"
    log_success "Environnement détecté : GitHub Codespace"
    WORKSPACE_DIR="/workspace"
else
    ENVIRONMENT="local"
    log_success "Environnement détecté : Installation locale"
    WORKSPACE_DIR="$(pwd)"
fi

# Se positionner dans le bon répertoire
cd "$WORKSPACE_DIR"

# ===============================================
# ÉTAPE 1 : CONFIGURATION ENVIRONNEMENT
# ===============================================

log_step "📄 Configuration du fichier .env..."

# Copier .env.example si nécessaire
if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
        log_success "Fichier .env créé depuis .env.example"
    else
        log_error "Fichier .env.example manquant"
        exit 1
    fi
else
    log_success "Fichier .env déjà présent"
fi

# Adapter la configuration selon l'environnement
if [ "$ENVIRONMENT" = "codespace" ]; then
    # Configuration Codespace
    sed -i 's|APP_URL=.*|APP_URL=https://'${CODESPACE_NAME}'-8000.app.github.dev|' .env
    sed -i 's|DB_HOST=.*|DB_HOST=database|' .env
    log_success "Configuration .env adaptée pour Codespace"
else
    # Configuration locale
    sed -i 's|APP_URL=.*|APP_URL=http://localhost:8000|' .env
    sed -i 's|DB_HOST=.*|DB_HOST=database|' .env
    log_success "Configuration .env adaptée pour Docker local"
fi

# ===============================================
# ÉTAPE 2 : INSTALLATION DES DÉPENDANCES PHP
# ===============================================

log_step "📦 Installation des dépendances PHP..."

if [ -d vendor ]; then
    log_success "Dossier vendor existant, mise à jour..."
    composer update --no-interaction --optimize-autoloader
else
    log_step "Installation complète des dépendances PHP..."
    composer install --no-interaction --optimize-autoloader
fi

# Générer la clé Laravel si nécessaire
if ! grep -q "APP_KEY=base64:" .env; then
    log_step "🔑 Génération de la clé Laravel..."
    php artisan key:generate --no-interaction
    log_success "Clé Laravel générée"
fi

# ===============================================
# ÉTAPE 3 : INSTALLATION DES DÉPENDANCES NODE.JS
# ===============================================

log_step "📦 Installation des dépendances Node.js..."

if [ -d node_modules ]; then
    log_success "Dossier node_modules existant"
else
    npm install --no-audit
    log_success "Dépendances Node.js installées"
fi

# Compilation des assets
log_step "🔨 Compilation des assets..."
npm run build
log_success "Assets compilés avec succès"

# ===============================================
# ÉTAPE 4 : ATTENDRE LES SERVICES DOCKER
# ===============================================

log_step "⏳ Attente des services Docker..."

# Fonction d'attente PostgreSQL
wait_for_postgres() {
    local timeout=60
    local counter=0
    
    while ! pg_isready -h database -p 5432 -U postgres -q 2>/dev/null; do
        if [ $counter -eq $timeout ]; then
            log_error "Timeout : PostgreSQL ne répond pas après ${timeout}s"
            return 1
        fi
        sleep 2
        counter=$((counter + 2))
        echo -n "."
    done
    echo ""
    log_success "PostgreSQL est prêt et accessible"
}

# Attendre PostgreSQL
if ! wait_for_postgres; then
    log_warning "PostgreSQL non accessible, vérifiez Docker"
    exit 1
fi

# ===============================================
# ÉTAPE 5 : CONFIGURATION LARAVEL
# ===============================================

log_step "🔗 Configuration Laravel..."

# Créer le lien storage
if [ ! -L public/storage ]; then
    php artisan storage:link --no-interaction
    log_success "Lien symbolique storage créé"
fi

# Créer les répertoires de cache
mkdir -p storage/logs
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p bootstrap/cache

# Configurer les permissions
chmod -R 775 storage bootstrap/cache
log_success "Permissions configurées"

# ===============================================
# ÉTAPE 6 : OPTIMISATION LARAVEL
# ===============================================

log_step "⚡ Optimisation Laravel..."

# Clear des caches existants
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Reconstruction des caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

log_success "Laravel optimisé pour la production"

# ===============================================
# ÉTAPE 7 : TEST DE LA BASE DE DONNÉES
# ===============================================

log_step "🗄️ Test de connexion à la base de données..."

# Test de connexion simple
if php artisan migrate:status >/dev/null 2>&1; then
    log_success "Connexion à la base de données fonctionnelle"
else
    log_warning "Base de données accessible mais pas encore migrée (normal pour Séance 1)"
fi

# ===============================================
# ÉTAPE 8 : DÉMARRAGE DU SERVEUR
# ===============================================

if [ "$ENVIRONMENT" = "codespace" ]; then
    log_step "🌐 Démarrage du serveur Laravel pour Codespace..."
    
    # Démarrer le serveur en arrière-plan
    nohup php artisan serve --host=0.0.0.0 --port=8000 > /tmp/laravel-server.log 2>&1 &
    SERVER_PID=$!
    
    # Sauvegarder le PID
    echo $SERVER_PID > /tmp/laravel-server.pid
    
    # Attendre un peu
    sleep 3
    
    if kill -0 $SERVER_PID 2>/dev/null; then
        log_success "Serveur Laravel démarré (PID: $SERVER_PID)"
    else
        log_error "Échec du démarrage du serveur"
        exit 1
    fi
else
    log_success "Configuration terminée pour Docker local"
fi

# ===============================================
# ÉTAPE 9 : VÉRIFICATIONS FINALES
# ===============================================

log_step "🔍 Vérifications finales..."

# Test Laravel
if php artisan --version >/dev/null 2>&1; then
    LARAVEL_VERSION=$(php artisan --version)
    log_success "$LARAVEL_VERSION fonctionnel"
else
    log_error "Laravel non fonctionnel"
    exit 1
fi

# Test des routes
if php artisan route:list >/dev/null 2>&1; then
    ROUTE_COUNT=$(php artisan route:list --compact | wc -l)
    log_success "Système de routes fonctionnel ($((ROUTE_COUNT - 1)) routes)"
fi

# ===============================================
# ÉTAPE 10 : AFFICHAGE FINAL
# ===============================================

echo ""
echo -e "${GREEN}╔════════════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║  ${SUCCESS} BiblioTech Séance 1 configuré avec succès !  ║${NC}"
echo -e "${GREEN}╚════════════════════════════════════════════════╝${NC}"
echo ""

log_success "🎯 Séance 1 : Fondations Laravel + Docker"
echo ""

if [ "$ENVIRONMENT" = "codespace" ]; then
    echo -e "${BLUE}🌐 Accès à l'application :${NC}"
    echo -e "   • VS Code → Onglet 'PORTS' → Cliquer sur 🌐 port 8000"
    echo -e "   • URL directe : https://${CODESPACE_NAME}-8000.app.github.dev"
    echo ""
    echo -e "${BLUE}📧 MailHog (tests email) :${NC}"
    echo -e "   • Port 8025 via l'onglet PORTS"
    echo ""
else
    echo -e "${BLUE}🌐 URLs de l'application :${NC}"
    echo -e "   • Application : http://localhost:8000"
    echo -e "   • MailHog : http://localhost:8025"
    echo -e "   • PostgreSQL : localhost:5432"
    echo ""
    echo -e "${BLUE}🚀 Démarrer l'application :${NC}"
    echo -e "   • make start"
    echo -e "   • ou : docker-compose up -d"
    echo ""
fi

echo -e "${YELLOW}📚 Documentation Séance 1 :${NC}"
echo -e "   • docs/seance-01/README.md - Guide complet"
echo -e "   • docs/seance-01/CONCEPTS.md - Concepts MVC"
echo -e "   • docs/seance-01/EXERCICES.md - Exercices pratiques"
echo ""

echo -e "${YELLOW}💡 Commandes utiles :${NC}"
echo -e "   • make check          # Vérifier l'installation"
echo -e "   • make logs           # Voir les logs"
echo -e "   • make shell          # Accès terminal"
echo -e "   • php artisan route:list  # Voir les routes"
echo ""

echo -e "${GREEN}🎉 Prêt à apprendre Laravel ! Consultez la documentation.${NC}"
echo ""
