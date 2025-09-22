#!/bin/bash
set -e

# ===============================================
# Script de démarrage automatique - BiblioTech Séance 1
# Exécuté automatiquement au démarrage du Codespace
# ===============================================

# Couleurs
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m'

log_info() {
    echo -e "${BLUE}ℹ️  $1${NC}"
}

log_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

echo ""
echo -e "${BLUE}🚀 Démarrage automatique BiblioTech - Séance 1${NC}"
echo ""

# Vérifier l'environnement
if [ -n "$CODESPACE_NAME" ]; then
    ENVIRONMENT="codespace"
    log_info "Environnement : GitHub Codespace ($CODESPACE_NAME)"
else
    ENVIRONMENT="local"
    log_info "Environnement : Docker local"
fi

# Se positionner dans le workspace
cd /workspace 2>/dev/null || cd "$(dirname "$0")/.."

# ===============================================
# VÉRIFICATIONS PRÉLIMINAIRES
# ===============================================

log_info "Vérification de l'installation..."

# Vérifier que les dépendances sont installées
if [ ! -d vendor ] || [ ! -d node_modules ]; then
    log_info "Installation incomplète détectée, lancement du setup..."
    bash .devcontainer/setup.sh
    exit 0
fi

# Vérifier la configuration Laravel
if [ ! -f .env ]; then
    log_info "Fichier .env manquant, lancement du setup..."
    bash .devcontainer/setup.sh
    exit 0
fi

# Vérifier la clé Laravel
if ! grep -q "APP_KEY=base64:" .env; then
    log_info "Clé Laravel manquante, génération..."
    php artisan key:generate --no-interaction
fi

# ===============================================
# DÉMARRAGE DES SERVICES
# ===============================================

if [ "$ENVIRONMENT" = "codespace" ]; then
    log_info "Démarrage du serveur Laravel pour Codespace..."
    
    # Vérifier si un serveur tourne déjà
    if [ -f /tmp/laravel-server.pid ]; then
        OLD_PID=$(cat /tmp/laravel-server.pid)
        if kill -0 $OLD_PID 2>/dev/null; then
            log_success "Serveur Laravel déjà actif (PID: $OLD_PID)"
            exit 0
        fi
    fi
    
    # Attendre que PostgreSQL soit prêt
    log_info "Attente de PostgreSQL..."
    timeout=30
    counter=0
    while ! pg_isready -h database -p 5432 -U postgres -q 2>/dev/null; do
        if [ $counter -eq $timeout ]; then
            log_info "PostgreSQL non disponible, continuons sans..."
            break
        fi
        sleep 1
        counter=$((counter + 1))
    done
    
    # Nettoyer les caches si nécessaire
    php artisan config:clear >/dev/null 2>&1 || true
    
    # Démarrer le serveur Laravel
    nohup php artisan serve --host=0.0.0.0 --port=8000 > /tmp/laravel-server.log 2>&1 &
    SERVER_PID=$!
    echo $SERVER_PID > /tmp/laravel-server.pid
    
    # Vérifier que le serveur démarre
    sleep 2
    if kill -0 $SERVER_PID 2>/dev/null; then
        log_success "Serveur Laravel démarré (PID: $SERVER_PID)"
        log_info "Accès via l'onglet PORTS de VS Code (port 8000)"
    else
        log_info "Problème de démarrage du serveur, vérifiez les logs"
    fi
    
else
    log_info "Environnement Docker local détecté"
    log_info "Le serveur sera démarré via docker-compose"
fi

# ===============================================
# VÉRIFICATIONS DE SANTÉ
# ===============================================

log_info "Vérifications de santé..."

# Test Laravel
if php artisan --version >/dev/null 2>&1; then
    LARAVEL_VERSION=$(php artisan --version | head -1)
    log_success "$LARAVEL_VERSION"
else
    log_info "Laravel non accessible (normal si pas encore configuré)"
fi

# Test des routes (si Laravel fonctionne)
if php artisan route:list >/dev/null 2>&1; then
    ROUTE_COUNT=$(php artisan route:list --compact 2>/dev/null | wc -l)
    log_success "Routes Laravel : $((ROUTE_COUNT - 1)) routes définies"
fi

# ===============================================
# MESSAGES D'INFORMATION
# ===============================================

echo ""
log_success "BiblioTech Séance 1 - Services démarrés"
echo ""

if [ "$ENVIRONMENT" = "codespace" ]; then
    echo -e "${YELLOW}📱 Accès à l'application :${NC}"
    echo "   • Onglet PORTS → Cliquer sur 🌐 port 8000"
    echo "   • MailHog : port 8025"
    echo ""
fi

echo -e "${YELLOW}📚 Prêt pour la Séance 1 :${NC}"
echo "   • Architecture MVC"
echo "   • Routes Laravel"
echo "   • Templates Blade"
echo "   • Docker basics"
echo ""

echo -e "${YELLOW}🔗 Documentation :${NC}"
echo "   • docs/seance-01/README.md"
echo "   • docs/seance-01/CONCEPTS.md"
echo ""

# Afficher les informations de debug si nécessaire
if [ "$APP_DEBUG" = "true" ] || [ "$APP_ENV" = "development" ]; then
    echo -e "${YELLOW}🔍 Debug activé - Logs disponibles :${NC}"
    echo "   • tail -f /tmp/laravel-server.log  # Logs serveur"
    echo "   • tail -f storage/logs/laravel.log  # Logs Laravel"
fi

echo ""
