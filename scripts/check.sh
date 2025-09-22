#!/bin/bash

# ===============================================
# Script de diagnostic BiblioTech
# Vérification complète de l'installation
# ===============================================

# Couleurs
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
NC='\033[0m'

# Émojis
SUCCESS="✅"
ERROR="❌"
WARNING="⚠️"
INFO="ℹ️"
SEARCH="🔍"

# Header
echo ""
echo -e "${BLUE}╔══════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║  ${SEARCH} Diagnostic BiblioTech - Séance 1        ║${NC}"
echo -e "${BLUE}║  Vérification complète de l'installation    ║${NC}"
echo -e "${BLUE}╚══════════════════════════════════════════════╝${NC}"
echo ""

# ===============================================
# DETECTION ENVIRONNEMENT
# ===============================================

if [ -n "$CODESPACE_NAME" ]; then
    ENVIRONMENT="codespace"
    echo -e "${INFO} Environnement : ${PURPLE}GitHub Codespace${NC} (${CODESPACE_NAME})"
    BASE_URL="https://${CODESPACE_NAME}-8000.app.github.dev"
elif [ -f /.dockerenv ]; then
    ENVIRONMENT="docker"
    echo -e "${INFO} Environnement : ${PURPLE}Container Docker${NC}"
    BASE_URL="http://localhost:8000"
else
    ENVIRONMENT="local"
    echo -e "${INFO} Environnement : ${PURPLE}Installation locale${NC}"
    BASE_URL="http://localhost:8000"
fi

echo ""

# ===============================================
# FONCTIONS DE TEST
# ===============================================

test_service() {
    local port=$1
    local name=$2
    local description=$3
    
    case $ENVIRONMENT in
        "codespace")
            # Dans Codespace, vérifier que le port est ouvert
            if ss -tlnp 2>/dev/null | grep ":$port " >/dev/null; then
                echo -e "${SUCCESS} $name"
                echo -e "    ${INFO} Port $port ouvert - Accès via onglet PORTS"
                return 0
            else
                echo -e "${ERROR} $name (port $port fermé)"
                return 1
            fi
            ;;
        "docker"|"local")
            # En local, tester la connectivité HTTP si possible
            if [ "$port" = "8000" ]; then
                if curl -f "$BASE_URL" >/dev/null 2>&1; then
                    echo -e "${SUCCESS} $name : $BASE_URL"
                    return 0
                else
                    echo -e "${WARNING} $name non accessible sur $BASE_URL"
                    echo -e "    ${INFO} Démarrer avec : make start"
                    return 1
                fi
            else
                if nc -z localhost $port 2>/dev/null; then
                    echo -e "${SUCCESS} $name (port $port ouvert)"
                    return 0
                else
                    echo -e "${WARNING} $name (port $port fermé)"
                    return 1
                fi
            fi
            ;;
    esac
}

test_file() {
    local file=$1
    local description=$2
    
    if [ -f "$file" ]; then
        echo -e "${SUCCESS} $description"
        return 0
    else
        echo -e "${ERROR} $description manquant"
        echo -e "    ${INFO} Fichier attendu : $file"
        return 1
    fi
}

test_directory() {
    local dir=$1
    local description=$2
    
    if [ -d "$dir" ]; then
        echo -e "${SUCCESS} $description"
        return 0
    else
        echo -e "${ERROR} $description manquant"
        echo -e "    ${INFO} Répertoire attendu : $dir"
        return 1
    fi
}

# ===============================================
# TESTS DES SERVICES
# ===============================================

echo -e "${YELLOW}🌐 Services Web :${NC}"
test_service 8000 "Application Laravel" "Serveur principal"
test_service 8025 "MailHog" "Interface email de test"
test_service 5432 "PostgreSQL" "Base de données"

echo ""

# ===============================================
# TESTS DES FICHIERS
# ===============================================

echo -e "${YELLOW}📁 Fichiers de Configuration :${NC}"
test_file ".env" "Fichier de configuration .env"
test_file ".env.example" "Fichier d'exemple .env.example"
test_file "artisan" "Console Laravel artisan"
test_file "composer.json" "Configuration Composer"
test_file "package.json" "Configuration NPM"

echo ""

# ===============================================
# TESTS DES REPERTOIRES
# ===============================================

echo -e "${YELLOW}📂 Répertoires Laravel :${NC}"
test_directory "app" "Code application Laravel"
test_directory "resources" "Ressources (vues, assets)"
test_directory "routes" "Définition des routes"
test_directory "database" "Base de données (migrations, seeders)"
test_directory "storage" "Storage Laravel"
test_directory "vendor" "Dépendances PHP (Composer)"
test_directory "node_modules" "Dépendances Node.js (NPM)"

echo ""

# ===============================================
# TESTS LARAVEL
# ===============================================

echo -e "${YELLOW}🔧 Laravel :${NC}"

# Version Laravel
if command -v php >/dev/null 2>&1; then
    if php artisan --version >/dev/null 2>&1; then
        LARAVEL_VERSION=$(php artisan --version | head -1)
        echo -e "${SUCCESS} $LARAVEL_VERSION"
    else
        echo -e "${ERROR} Laravel non fonctionnel"
    fi
else
    echo -e "${WARNING} PHP non accessible directement"
fi

# Clé d'application
if grep -q "APP_KEY=base64:" .env 2>/dev/null; then
    echo -e "${SUCCESS} Clé d'application configurée"
else
    echo -e "${ERROR} Clé d'application manquante"
    echo -e "    ${INFO} Générer avec : php artisan key:generate"
fi

# Routes Laravel
if php artisan route:list >/dev/null 2>&1; then
    ROUTE_COUNT=$(php artisan route:list --compact 2>/dev/null | wc -l)
    echo -e "${SUCCESS} Système de routes ($((ROUTE_COUNT - 1)) routes)"
else
    echo -e "${WARNING} Problème avec les routes Laravel"
fi

# Storage link
if [ -L public/storage ]; then
    echo -e "${SUCCESS} Lien symbolique storage configuré"
else
    echo -e "${WARNING} Lien symbolique storage manquant"
    echo -e "    ${INFO} Créer avec : php artisan storage:link"
fi

echo ""

# ===============================================
# TESTS OUTILS DE DEVELOPPEMENT
# ===============================================

echo -e "${YELLOW}🛠️ Outils de Développement :${NC}"

# PHP
if command -v php >/dev/null 2>&1; then
    PHP_VERSION=$(php --version | head -1 | cut -d' ' -f2 | cut -d'.' -f1,2)
    echo -e "${SUCCESS} PHP $PHP_VERSION"
else
    echo -e "${ERROR} PHP non trouvé"
fi

# Composer
if command -v composer >/dev/null 2>&1; then
    COMPOSER_VERSION=$(composer --version --no-ansi | cut -d' ' -f3)
    echo -e "${SUCCESS} Composer $COMPOSER_VERSION"
else
    echo -e "${ERROR} Composer non trouvé"
fi

# Node.js
if command -v node >/dev/null 2>&1; then
    NODE_VERSION=$(node --version)
    echo -e "${SUCCESS} Node.js $NODE_VERSION"
else
    echo -e "${ERROR} Node.js non trouvé"
fi

# NPM
if command -v npm >/dev/null 2>&1; then
    NPM_VERSION=$(npm --version)
    echo -e "${SUCCESS} NPM $NPM_VERSION"
else
    echo -e "${ERROR} NPM non trouvé"
fi

echo ""

# ===============================================
# TESTS ASSETS
# ===============================================

echo -e "${YELLOW}🎨 Assets Frontend :${NC}"

if [ -d public/build ]; then
    echo -e "${SUCCESS} Assets compilés (public/build/)"
else
    echo -e "${WARNING} Assets non compilés"
    echo -e "    ${INFO} Compiler avec : npm run build"
fi

if [ -f public/mix-manifest.json ] || [ -f public/build/manifest.json ]; then
    echo -e "${SUCCESS} Manifest des assets présent"
else
    echo -e "${WARNING} Manifest des assets manquant"
fi

echo ""

# ===============================================
# RECOMMANDATIONS
# ===============================================

echo -e "${YELLOW}💡 Recommandations :${NC}"

case $ENVIRONMENT in
    "codespace")
        echo -e "${INFO} Accès application :"
        echo "   • VS Code → Onglet PORTS → Cliquer 🌐 port 8000"
        if [ -n "$CODESPACE_NAME" ]; then
            echo "   • URL directe : $BASE_URL"
        fi
        ;;
    "local"|"docker")
        echo -e "${INFO} Commandes utiles :"
        echo "   • make start    # Démarrer l'application"
        echo "   • make logs     # Voir les logs"
        echo "   • make shell    # Accéder au terminal"
        ;;
esac

echo ""
echo -e "${INFO} Documentation :"
echo "   • docs/seance-01/README.md - Guide Séance 1"
echo "   • docs/seance-01/CONCEPTS.md - Concepts MVC"
echo ""

# ===============================================
# RESUME FINAL
# ===============================================

echo -e "${BLUE}╔══════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║  📊 Résumé du Diagnostic                     ║${NC}"
echo -e "${BLUE}╚══════════════════════════════════════════════╝${NC}"

if [ -f .env ] && [ -d vendor ] && [ -d node_modules ]; then
    echo -e "${GREEN}🎉 Installation BiblioTech fonctionnelle !${NC}"
    echo -e "${SUCCESS} Prêt pour la Séance 1 : Fondations Laravel + Docker"
else
    echo -e "${YELLOW}⚠️ Installation incomplète détectée${NC}"
    echo -e "${INFO} Relancer l'installation avec : make install"
fi

echo ""
