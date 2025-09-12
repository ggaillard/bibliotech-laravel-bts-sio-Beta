#!/bin/bash
set -e

echo ""
echo "🚀 Configuration BiblioTech - Séance 1 : Fondations Laravel + Docker"
echo "📚 Formation BTS SIO SLAM"
echo ""

# Fonction d'affichage avec émoji
log_step() {
    echo "$(date '+%H:%M:%S') $1"
}

log_step "📂 Configuration du workspace..."

# S'assurer qu'on est dans le bon répertoire
cd /workspace

# Copier .env si nécessaire
if [ ! -f .env ]; then
    log_step "📄 Création du fichier .env..."
    cp .env.example .env
    echo "✅ Fichier .env créé avec les bonnes valeurs pour Codespace"
fi

# Installation des dépendances PHP
log_step "📦 Installation des dépendances PHP (Composer)..."
composer install --no-interaction --prefer-dist --optimize-autoloader

# Générer clé application Laravel
log_step "🔑 Génération de la clé d'application Laravel..."
php artisan key:generate --no-interaction

# Installation des dépendances NPM
log_step "📦 Installation des dépendances NPM..."
npm install

# Compiler les assets
log_step "🔨 Compilation des assets frontend (CSS/JS)..."
npm run build

# Configuration des permissions
log_step "🔧 Configuration des permissions..."
sudo chown -R vscode:vscode storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Attendre que PostgreSQL soit prêt
log_step "⏳ Attente de PostgreSQL..."
timeout=60
counter=0
while ! pg_isready -h database -p 5432 -U postgres -q; do
    if [ $counter -eq $timeout ]; then
        echo "❌ Timeout : PostgreSQL ne répond pas après ${timeout}s"
        exit 1
    fi
    sleep 2
    counter=$((counter+2))
done
echo "✅ PostgreSQL est prêt"

# Lancer les migrations (pour les séances futures)
log_step "🗄️ Préparation de la base de données..."
# Pour la séance 1, on ne lance pas encore les migrations
# php artisan migrate --no-interaction --force

# Créer le lien de storage
log_step "🔗 Création du lien symbolique storage..."
php artisan storage:link --no-interaction

# Optimisations Laravel pour développement
log_step "⚡ Optimisations Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Afficher les informations utiles
echo ""
echo "✅ Configuration terminée avec succès !"
echo ""
echo "📚 BiblioTech - Séance 1 est prêt"
echo "🎯 Objectifs : MVC + Blade + Docker"
echo ""
echo "🌐 URLs disponibles :"
echo "   Application : http://localhost:8000"
echo "   MailHog     : http://localhost:8025"
echo "   Adminer     : http://localhost:8080"
echo ""
echo "📖 Documentation :"
echo "   Guide démarrage : docs/SEANCE-1/README.md"
echo "   Concepts MVC    : docs/SEANCE-1/CONCEPTS.md"
echo "   Exercices       : docs/SEANCE-1/EXERCICES.md"
echo ""
echo "🎮 Commandes utiles :"
echo "   php artisan route:list    # Voir les routes"
echo "   php artisan tinker        # Console Laravel"
echo "   npm run dev              # Compilation assets (watch)"
echo ""

# Afficher les routes disponibles
log_step "📍 Routes configurées :"
php artisan route:list --compact

echo ""
echo "🎉 Prêt à apprendre Laravel ! Consultez la documentation pour commencer."
echo ""