#!/bin/bash
set -e

# ===============================================
# Script d'installation universel BiblioTech
# Auto-détection : Codespace vs Local
# ===============================================

# Couleurs
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

echo -e "${BLUE}🚀 Installation BiblioTech - Auto-détection environnement${NC}"

# ===============================================
# DETECTION ENVIRONNEMENT
# ===============================================

if [ -n "$CODESPACE_NAME" ]; then
    ENVIRONMENT="codespace"
    echo -e "${GREEN}✅ Environnement détecté : GitHub Codespace${NC}"
    WORKSPACE_DIR="/workspace"
elif [ -f /.dockerenv ]; then
    ENVIRONMENT="docker"
    echo -e "${GREEN}✅ Environnement détecté : Container Docker${NC}"
    WORKSPACE_DIR="/workspace"
else
    ENVIRONMENT="local"
    echo -e "${GREEN}✅ Environnement détecté : Installation locale${NC}"
    WORKSPACE_DIR="$(pwd)"
fi

# Se positionner dans le workspace
cd "$WORKSPACE_DIR"

# ===============================================
# CONFIGURATION .ENV
# ===============================================

echo -e "${BLUE}📄 Configuration .env...${NC}"

if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        cp .env.example .env
        echo -e "${GREEN}✅ Fichier .env créé${NC}"
    else
        echo -e "${RED}❌ Fichier .env.example manquant${NC}"
        exit 1
    fi
fi

# Configuration selon l'environnement
case $ENVIRONMENT in
    "codespace")
        sed -i "s|APP_URL=.*|APP_URL=https://${CODESPACE_NAME}-8000.app.github.dev|" .env
        sed -i 's|DB_HOST=.*|DB_HOST=database|' .env
        echo -e "${GREEN}✅ Configuration Codespace appliquée${NC}"
        ;;
    "docker")
        sed -i 's|APP_URL=.*|APP_URL=http://localhost:8000|' .env
        sed -i 's|DB_HOST=.*|DB_HOST=database|' .env
        echo -e "${GREEN}✅ Configuration Docker appliquée${NC}"
        ;;
    "local")
        sed -i 's|APP_URL=.*|APP_URL=http://localhost:8000|' .env
        echo -e "${GREEN}✅ Configuration locale appliquée${NC}"
        ;;
esac

# ===============================================
# INSTALLATION DEPENDANCES
# ===============================================

echo -e "${BLUE}📦 Installation des dépendances...${NC}"

# PHP - Composer
if [ ! -d vendor ]; then
    echo -e "${YELLOW}📦 Installation Composer...${NC}"
    composer install --no-interaction --optimize-autoloader
    echo -e "${GREEN}✅ Composer installé${NC}"
else
    echo -e "${GREEN}✅ Composer déjà installé${NC}"
fi

# Node.js - NPM
if [ ! -d node_modules ]; then
    echo -e "${YELLOW}📦 Installation NPM...${NC}"
    npm install --silent
    echo -e "${GREEN}✅ NPM installé${NC}"
else
    echo -e "${GREEN}✅ NPM déjà installé${NC}"
fi

# ===============================================
# CONFIGURATION LARAVEL
# ===============================================

echo -e "${BLUE}🔧 Configuration Laravel...${NC}"

# Génération clé Laravel
if ! grep -q "APP_KEY=base64:" .env; then
    echo -e "${YELLOW}🔑 Génération clé Laravel...${NC}"
    php artisan key:generate --no-interaction
    echo -e "${GREEN}✅ Clé Laravel générée${NC}"
fi

# Compilation assets
echo -e "${YELLOW}🎨 Compilation assets...${NC}"
npm run build --silent
echo -e "${GREEN}✅ Assets compilés${NC}"

# Permissions
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Storage link
php artisan storage:link --no-interaction 2>/dev/null || true

# Cache Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo -e "${GREEN}✅ Laravel configuré${NC}"

# ===============================================
# DEMARRAGE SELON ENVIRONNEMENT
# ===============================================

case $ENVIRONMENT in
    "codespace")
        echo -e "${BLUE}🌐 Démarrage serveur Codespace...${NC}"
        
        # Attendre PostgreSQL
        echo -e "${YELLOW}⏳ Attente PostgreSQL...${NC}"
        timeout=30
        counter=0
        while ! pg_isready -h database -p 5432 -U postgres -q 2>/dev/null; do
            if [ $counter -eq $timeout ]; then
                echo -e "${YELLOW}⚠️ PostgreSQL non disponible, continuons...${NC}"
                break
            fi
            sleep 1
            counter=$((counter + 1))
        done
        
        # Démarrer serveur en arrière-plan
        nohup php artisan serve --host=0.0.0.0 --port=8000 > /tmp/laravel-server.log 2>&1 &
        SERVER_PID=$!
        echo $SERVER_PID > /tmp/laravel-server.pid
        
        sleep 2
        if kill -0 $SERVER_PID 2>/dev/null; then
            echo -e "${GREEN}✅ Serveur Laravel démarré (PID: $SERVER_PID)${NC}"
            echo -e "${BLUE}🌐 Accès via l'onglet PORTS → port 8000${NC}"
        fi
        ;;
        
    "local")
        echo -e "${BLUE}🏠 Configuration locale terminée${NC}"
        echo -e "${YELLOW}💡 Commandes utiles :${NC}"
        echo "  • make start          # Démarrer avec Docker"
        echo "  • php artisan serve   # Serveur Laravel direct"
        ;;
esac

# ===============================================
# MESSAGES FINAUX
# ===============================================

echo ""
echo -e "${GREEN}✅ Installation BiblioTech terminée !${NC}"
echo ""

case $ENVIRONMENT in
    "codespace")
        echo -e "${BLUE}🌐 Accès application :${NC}"
        echo "   • Onglet PORTS → Cliquer 🌐 port 8000"
        echo "   • MailHog : port 8025"
        ;;
    "local")
        echo -e "${BLUE}🌐 Accès application :${NC}"
        echo "   • make start → http://localhost:8000"
        echo "   • MailHog : http://localhost:8025"
        ;;
esac

echo ""
echo -e "${YELLOW}📚 Documentation :${NC}"
echo "   • docs/seance-01/README.md - Guide Séance 1"
echo "   • docs/seance-01/CONCEPTS.md - Concepts MVC"
echo ""

echo -e "${YELLOW}🔧 Commandes utiles :${NC}"
echo "   • make check    # Vérifier installation"
echo "   • make logs     # Voir les logs"
echo "   • make shell    # Terminal"
echo ""

echo -e "${GREEN}🎉 Prêt à apprendre Laravel !${NC}"
