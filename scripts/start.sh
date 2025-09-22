#!/bin/bash
set -e

# ===============================================
# Script de démarrage universel BiblioTech
# Codespace, Docker, Local
# ===============================================

GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

# Détection environnement
if [ -n "$CODESPACE_NAME" ]; then
    ENVIRONMENT="codespace"
    echo -e "${GREEN}✅ Environnement : GitHub Codespace${NC}"
    DB_HOST="database"
elif [ -f /.dockerenv ]; then
    ENVIRONMENT="docker"
    echo -e "${GREEN}✅ Environnement : Docker${NC}"
    DB_HOST="database"
else
    ENVIRONMENT="local"
    echo -e "${GREEN}✅ Environnement : Local${NC}"
    DB_HOST="127.0.0.1"
fi

# Attente base de données (PostgreSQL)
echo -e "${BLUE}⏳ Attente base de données...${NC}"
for i in {1..30}; do
    if pg_isready -h "$DB_HOST" -p 5432 -U postgres -q 2>/dev/null; then
        echo -e "${GREEN}✅ Base de données prête${NC}"
        break
    fi
    sleep 1
done

# Vérifier si serveur déjà actif
if [ -f /tmp/laravel-server.pid ]; then
    OLD_PID=$(cat /tmp/laravel-server.pid)
    if kill -0 $OLD_PID 2>/dev/null; then
        echo -e "${GREEN}✅ Serveur Laravel déjà actif (PID: $OLD_PID)${NC}"
        exit 0
    fi
fi

# Démarrer serveur Laravel en arrière-plan
nohup php artisan serve --host=0.0.0.0 --port=8000 > /tmp/laravel-server.log 2>&1 &
SERVER_PID=$!
echo $SERVER_PID > /tmp/laravel-server.pid

sleep 2
if kill -0 $SERVER_PID 2>/dev/null; then
    echo -e "${GREEN}✅ Serveur Laravel démarré (PID: $SERVER_PID)${NC}"
    echo -e "${BLUE}🌐 Accès via http://localhost:8000 ou l'onglet PORTS${NC}"
else
    echo -e "${RED}❌ Erreur démarrage serveur${NC}"
fi
