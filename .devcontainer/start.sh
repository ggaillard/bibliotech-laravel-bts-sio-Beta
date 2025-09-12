#!/bin/bash

echo ""
echo "🌐 Démarrage du serveur Laravel..."
echo ""

# S'assurer qu'on est dans le bon répertoire
cd /workspace

# Vérifier que tout est bien configuré
if [ ! -f ".env" ]; then
    echo "⚠️  Fichier .env manquant. Exécution du setup..."
    bash .devcontainer/setup.sh
fi

# Nettoyer les caches au cas où
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Démarrer le serveur Laravel
echo "🚀 Démarrage du serveur sur http://localhost:8000..."
echo ""

# Afficher les informations de la séance active
echo "📚 Séance 1 Active : Fondations Laravel + Docker"
echo "🎯 Objectifs :"
echo "   ✅ Comprendre l'architecture MVC"
echo "   ✅ Créer des routes et contrôleurs"
echo "   ✅ Maîtriser les vues Blade"
echo "   ✅ Découvrir Docker et les containers"
echo ""

# Démarrer le serveur
php artisan serve --host=0.0.0.0 --port=8000