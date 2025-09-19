# 🆘 Guide de Dépannage - BiblioTech Laravel BTS SIO

> **Guide complet** pour résoudre tous les problèmes courants du projet BiblioTech dans l'environnement GitHub Codespace et installation locale.

## 📋 Table des Matières

1. [🚨 Problèmes Critiques](#-problèmes-critiques)
2. [⚡ Solutions Rapides](#-solutions-rapides) 
3. [🐳 Problèmes Docker/Codespace](#-problèmes-dockercodespace)
4. [🌐 Problèmes Laravel](#-problèmes-laravel)
5. [🗄️ Problèmes Base de Données](#-problèmes-base-de-données)
6. [🎨 Problèmes Frontend](#-problèmes-frontend)
7. [🔧 Diagnostic Avancé](#-diagnostic-avancé)
8. [📞 Support et Contact](#-support-et-contact)

---

## 🚨 Problèmes Critiques

### ❌ **Application ne démarre pas du tout**

**Symptômes :**
- Codespace ne se lance pas
- Erreur 500 sur http://localhost:8000
- Terminal affiche des erreurs rouges

**Solutions par priorité :**

1. **Reconstruction complète du Codespace :**
   ```bash
   # Dans GitHub : Codespace > Actions > Rebuild Container
   # Ou via le terminal Codespace :
   Ctrl+Shift+P > "Codespaces: Rebuild Container"
   ```

2. **Vérification des services :**
   ```bash
   # Vérifier l'état des services Docker
   docker-compose ps
   
   # Redémarrer tous les services
   docker-compose restart
   
   # Logs détaillés
   docker-compose logs app
   ```

3. **Réinitialisation complète :**
   ```bash
   # Supprimer le Codespace et le recréer depuis GitHub
   # GitHub > Code > Codespaces > [...] > Delete
   ```

### ❌ **Base de données inaccessible**

**Symptômes :**
- Erreur "SQLSTATE[08006] [7] could not connect to server"
- Page blanche ou erreur 500

**Solution immédiate :**
```bash
# Vérifier PostgreSQL
docker-compose exec database pg_isready -U postgres

# Si échec, redémarrer PostgreSQL
docker-compose restart database

# Attendre 10 secondes puis relancer Laravel
docker-compose restart app
```

---

## ⚡ Solutions Rapides

### 🔥 **Top 10 des Solutions Express**

| 🚨 Problème | ⚡ Solution 1-Ligne | ⏱️ Temps |
|-------------|-------------------|---------|
| **Port 8000 occupé** | `php artisan serve --port=8001` | 10s |
| **Erreur 500 générale** | `php artisan config:clear && php artisan cache:clear` | 15s |
| **Assets non compilés** | `npm run build` | 30s |
| **Base de données vide** | `php artisan migrate:fresh --seed` | 45s |
| **Permissions Docker** | `sudo chown -R $USER:$USER storage bootstrap/cache` | 20s |
| **Route introuvable** | `php artisan route:cache` | 10s |
| **Vues non mises à jour** | `php artisan view:clear` | 5s |
| **Variables d'environnement** | `cp .env.example .env && php artisan key:generate` | 15s |
| **Composants JS cassés** | `npm install && npm run dev` | 1-2min |
| **Cache corrompu** | `php artisan optimize:clear` | 20s |

### 🔧 **Commande de Réparation Universelle**

```bash
# 🏥 RÉPARATION COMPLÈTE (à exécuter en cas de problème mystérieux)
#!/bin/bash
echo "🔧 Début de la réparation BiblioTech..."

# Nettoyage complet
php artisan down
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Reconstruction des assets
npm install --no-fund
npm run build

# Base de données
php artisan migrate:fresh --seed --no-interaction

# Optimisation
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Permissions
chmod -R 755 storage bootstrap/cache
php artisan storage:link

# Redémarrage
php artisan up
php artisan serve --host=0.0.0.0 --port=8000 &

echo "✅ Réparation terminée ! Test sur http://localhost:8000"
```

---

## 🐳 Problèmes Docker/Codespace

### ❌ **Codespace lent ou qui freeze**

**Causes possibles :**
- RAM insuffisante
- Trop d'onglets ouverts
- Extensions VS Code lourdes

**Solutions :**
```bash
# Vérifier l'utilisation mémoire
free -h
docker system df

# Nettoyer Docker
docker system prune -f
docker volume prune -f

# Redémarrer VS Code
Ctrl+Shift+P > "Developer: Restart Extension Host"
```

### ❌ **Services Docker ne démarrent pas**

```bash
# Diagnostic complet
docker-compose config  # Vérifier la configuration
docker-compose ps     # État des services
docker-compose logs   # Logs détaillés

# Solutions par service
docker-compose up database  # PostgreSQL uniquement
docker-compose up app      # Laravel uniquement
docker-compose up mailhog  # MailHog uniquement

# Reconstruction forcée
docker-compose down -v
docker-compose build --no-cache
docker-compose up -d
```

### ❌ **Ports non accessibles**

**Problème :** http://localhost:8000 ne répond pas

**Diagnostic :**
```bash
# Vérifier les ports ouverts
lsof -i :8000
netstat -tlnp | grep 8000

# Forcer le port forwarding (Codespace)
# VS Code > Ports tab > Forward a Port > 8000
```

**Solution :**
```bash
# Changer de port
php artisan serve --host=0.0.0.0 --port=8001

# Ou forcer le binding
php artisan serve --host=0.0.0.0 --port=8000 --tries=0
```

---

## 🌐 Problèmes Laravel

### ❌ **Erreur 500 - Internal Server Error**

**Diagnostic par étapes :**

1. **Activer le mode debug :**
   ```bash
   # Vérifier .env
   cat .env | grep APP_DEBUG
   
   # Si APP_DEBUG=false, changer pour :
   sed -i 's/APP_DEBUG=false/APP_DEBUG=true/' .env
   php artisan config:clear
   ```

2. **Consulter les logs Laravel :**
   ```bash
   # Logs en temps réel
   tail -f storage/logs/laravel.log
   
   # Dernières erreurs
   tail -20 storage/logs/laravel.log
   
   # Rechercher une erreur spécifique
   grep -i "error" storage/logs/laravel.log
   ```

3. **Vérifier les permissions :**
   ```bash
   # Permissions correctes
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   
   # Pour environnement local (non Codespace)
   sudo chown -R $USER:www-data storage
   sudo chown -R $USER:www-data bootstrap/cache
   ```

### ❌ **Routes non reconnues**

**Symptômes :**
- 404 pour des routes qui existent
- `Route [xxx] not defined`

**Solutions :**
```bash
# Vérifier les routes existantes
php artisan route:list

# Nettoyer le cache des routes
php artisan route:clear

# Vérifier la syntaxe dans web.php
php -l routes/web.php

# Reconstruire le cache des routes
php artisan route:cache
```

### ❌ **Problèmes de Clé d'Application**

```bash
# Erreur : "No application encryption key has been specified"

# Solution :
cp .env.example .env
php artisan key:generate
php artisan config:cache
```

### ❌ **Erreurs Blade/Vues**

**Symptômes :**
- `View [xxx] not found`
- Erreurs de syntaxe Blade

**Solutions :**
```bash
# Nettoyer le cache des vues
php artisan view:clear

# Vérifier l'existence des vues
ls -la resources/views/

# Test de syntaxe des templates
php artisan view:cache
```

---

## 🗄️ Problèmes Base de Données

### ❌ **Connexion PostgreSQL échoue**

**Erreurs courantes :**
- `SQLSTATE[08006] [7] could not connect to server`
- `Connection refused`

**Diagnostic :**
```bash
# Vérifier l'état de PostgreSQL
docker-compose ps database

# Test de connexion directe
docker-compose exec database psql -U postgres -d bibliotech_db -c '\l'

# Vérifier la configuration .env
grep DB_ .env
```

**Solutions :**
```bash
# Redémarrer PostgreSQL
docker-compose restart database

# Attendre que PostgreSQL soit prêt
until docker-compose exec database pg_isready -h localhost -p 5432 -U postgres; do
  echo "Attente PostgreSQL..."
  sleep 2
done

# Recréer la base de données
docker-compose exec database psql -U postgres -c "DROP DATABASE IF EXISTS bibliotech_db;"
docker-compose exec database psql -U postgres -c "CREATE DATABASE bibliotech_db;"
```

### ❌ **Migrations échouent**

```bash
# Voir l'état des migrations
php artisan migrate:status

# Réinitialisation complète (ATTENTION : supprime les données)
php artisan migrate:fresh --seed

# Migration une par une pour débug
php artisan migrate --step=1

# Rollback de la dernière migration
php artisan migrate:rollback
```

### ❌ **Seeders ne fonctionnent pas**

```bash
# Exécuter les seeders manuellement
php artisan db:seed

# Seeder spécifique
php artisan db:seed --class=BookSeeder

# Debug d'un seeder
php artisan tinker
>>> \App\Models\Book::count();
>>> \Database\Seeders\BookSeeder::class
```

---

## 🎨 Problèmes Frontend

### ❌ **CSS/JS non chargés**

**Symptômes :**
- Styles Bootstrap manquants
- JavaScript non fonctionnel
- Erreurs 404 sur les assets

**Solutions :**
```bash
# Vérifier les assets
ls -la public/build/

# Recompiler les assets
npm install
npm run build

# En cas d'erreur NPM
rm -rf node_modules package-lock.json
npm install
npm run build

# Vérifier le lien symbolic
php artisan storage:link
ls -la public/storage
```

### ❌ **Vite ne compile pas**

```bash
# Debug Vite
npm run dev

# Configuration Vite
cat vite.config.js

# Test de build de production
npm run build -- --debug
```

### ❌ **Images/assets manquants**

```bash
# Vérifier le stockage
php artisan storage:link

# Permissions des assets
chmod -R 755 public/
chmod -R 755 storage/app/public/

# Test d'upload
php artisan tinker
>>> Storage::disk('public')->put('test.txt', 'Hello World');
>>> Storage::disk('public')->exists('test.txt');
```

---

## 🔧 Diagnostic Avancé

### 🔍 **Checklist de Diagnostic Complet**

Utilisez cette checklist quand rien ne fonctionne :

```bash
# ✅ 1. ENVIRONNEMENT
echo "=== ENVIRONNEMENT ==="
php --version
composer --version
node --version
npm --version

# ✅ 2. DOCKER
echo "=== DOCKER ==="
docker --version
docker-compose --version
docker-compose ps

# ✅ 3. LARAVEL
echo "=== LARAVEL ==="
php artisan --version
php artisan env
php artisan route:list --compact

# ✅ 4. BASE DE DONNÉES  
echo "=== DATABASE ==="
php artisan migrate:status
docker-compose exec database psql -U postgres -d bibliotech_db -c '\dt'

# ✅ 5. PERMISSIONS
echo "=== PERMISSIONS ==="
ls -la storage/
ls -la bootstrap/cache/
ls -la public/

# ✅ 6. CONFIGURATION
echo "=== CONFIG ==="
php artisan config:show app
php artisan config:show database

# ✅ 7. LOGS
echo "=== LOGS ==="
tail -10 storage/logs/laravel.log
```

### 📊 **Script de Santé de l'Application**

```bash
#!/bin/bash
# 🏥 HEALTH CHECK BiblioTech

echo "🏥 Contrôle de Santé BiblioTech"
echo "=================================="

# Variables
STATUS_OK="✅"
STATUS_ERROR="❌"
STATUS_WARNING="⚠️"

# Tests
echo "1. Application Laravel..."
if php artisan route:list > /dev/null 2>&1; then
    echo "$STATUS_OK Laravel opérationnel"
else
    echo "$STATUS_ERROR Laravel ne répond pas"
fi

echo "2. Base de données..."
if php artisan migrate:status > /dev/null 2>&1; then
    echo "$STATUS_OK PostgreSQL connecté"
else
    echo "$STATUS_ERROR PostgreSQL inaccessible"
fi

echo "3. Serveur web..."
if curl -f http://localhost:8000 > /dev/null 2>&1; then
    echo "$STATUS_OK Serveur web actif"
else
    echo "$STATUS_ERROR Serveur web inactif"
fi

echo "4. Assets compilés..."
if [ -d "public/build" ]; then
    echo "$STATUS_OK Assets présents"
else
    echo "$STATUS_WARNING Assets non compilés"
fi

echo "5. Permissions..."
if [ -w "storage/logs" ]; then
    echo "$STATUS_OK Permissions OK"
else
    echo "$STATUS_ERROR Problème de permissions"
fi

echo ""
echo "🔗 URLs de test :"
echo "   - Application : http://localhost:8000"
echo "   - MailHog : http://localhost:8025"
echo "   - Adminer : http://localhost:8080"
```

---

## 📞 Support et Contact

### 🆘 **Besoin d'aide ?**

1. **🔍 Recherche dans la documentation :**
   - [README.md](../README.md) - Guide principal
   - [Concepts Laravel](./seance-01/CONCEPTS.md) - Explications détaillées
   - [Exercices](./seance-01/EXERCICES.md) - Pratique guidée

2. **💬 GitHub Issues :**
   - [Créer un Bug Report](../.github/ISSUE_TEMPLATE/bug-report.md)
   - [Poser une Question](../.github/ISSUE_TEMPLATE/question-seance.md)
   - [Consulter les Issues existantes](../../issues)

3. **🤝 Communauté :**
   - GitHub Discussions du projet
   - Forums BTS SIO
   - Discord Laravel France

### 📝 **Avant de Demander de l'Aide**

**Informations à fournir :**
- **Séance concernée :** Séance 1, 2, 3, etc.
- **Environnement :** GitHub Codespace / Installation locale
- **Erreur exacte :** Copie du message d'erreur complet
- **Étapes reproduisant le bug :** Actions effectuées avant l'erreur
- **Solutions tentées :** Ce que vous avez déjà essayé

**Template de message d'aide :**
```markdown
## Problème
[Description courte]

## Environnement
- Séance : [X]
- Plateforme : [Codespace/Local]
- Navigateur : [Chrome/Firefox/etc.]

## Erreur
```
[Coller l'erreur complète ici]
```

## Étapes pour reproduire
1. [Action 1]
2. [Action 2] 
3. [Erreur apparaît]

## Solutions tentées
- [X] Redémarrage serveur
- [X] Cache cleared
- [ ] Autre solution...
```

---

## 🎯 **Conseils pour Éviter les Problèmes**

### ✅ **Bonnes Pratiques**

1. **Toujours commencer par :**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

2. **Sauvegarder régulièrement :**
   - Commit Git après chaque exercice réussi
   - Export de la base de données avant modifications importantes

3. **Surveiller les logs :**
   ```bash
   # Terminal dédié aux logs
   tail -f storage/logs/laravel.log
   ```

4. **Vérifier les URL :**
   - Toujours utiliser `route('nom.route')` plutôt que des URL hardcodées
   - Tester les liens après modifications

5. **Environnement propre :**
   - Ne pas modifier les fichiers de configuration Docker
   - Garder le `.env` synchronisé avec `.env.example`

### ⚠️ **Erreurs à Éviter**

- ❌ Modifier directement la base de données sans migrations
- ❌ Hardcoder des valeurs dans les contrôleurs
- ❌ Ignorer les erreurs dans les logs
- ❌ Supprimer des fichiers sans savoir leur rôle
- ❌ Travailler sans versionning Git

---

**🔧 Ce guide est mis à jour régulièrement. N'hésitez pas à contribuer avec vos propres solutions !**

---

*Dernière mise à jour : Septembre 2025 - Version Séance 1*
