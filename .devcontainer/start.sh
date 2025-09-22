#!/bin/bash
set -e

# Start spécifique GitHub Codespace
echo "🌐 Démarrage serveur BiblioTech Codespace..."

cd /workspace

# Attendre PostgreSQL
echo "⏳ Attente PostgreSQL..."
while ! pg_isready -h database -p 5432 -U postgres -q 2>/dev/null; do
    sleep 1
done
echo "✅ PostgreSQL prêt"

# Vérifier si serveur déjà actif
if [ -f /tmp/laravel-server.pid ]; then
    OLD_PID=$(cat /tmp/laravel-server.pid)
    if kill -0 $OLD_PID 2>/dev/null; then
        echo "✅ Serveur Laravel déjà actif"
        exit 0
    fi
fi

# Démarrer serveur en arrière-plan
nohup php artisan serve --host=0.0.0.0 --port=8000 > /tmp/laravel-server.log 2>&1 &
SERVER_PID=$!
echo $SERVER_PID > /tmp/laravel-server.pid

sleep 2
if kill -0 $SERVER_PID 2>/dev/null; then
    echo "✅ Serveur Laravel démarré (PID: $SERVER_PID)"
    echo "🌐 Accès via l'onglet PORTS → port 8000"
else
    echo "❌ Erreur démarrage serveur"
fi
