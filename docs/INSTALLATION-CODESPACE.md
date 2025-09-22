# ☁️ Guide GitHub Codespace - BiblioTech

> **🎯 Environnement de développement cloud prêt en 30 secondes**

---

## 🌟 Qu'est-ce que GitHub Codespace ?

**GitHub Codespace** est un environnement de développement complet dans le cloud qui :

- ✅ **S'ouvre dans votre navigateur** (ou VS Code Desktop)
- ✅ **Contient tout** : PHP, Laravel, PostgreSQL, VS Code
- ✅ **Configuration automatique** du projet BiblioTech
- ✅ **Même environnement** pour tous les étudiants
- ✅ **Accessible partout** : PC, Mac, tablette, Chromebook

---

## 🚀 Création de votre Codespace

### **Étape 1 : Lancement**

**Méthode A - Badge direct :**
[![Open in GitHub Codespaces](https://github.com/codespaces/badge.svg)](https://codespaces.new/votre-org/bibliotech)

**Méthode B - Depuis GitHub :**
1. Aller sur https://github.com/votre-org/bibliotech
2. Cliquer sur le bouton vert **"Code"**
3. Sélectionner l'onglet **"Codespaces"**
4. Cliquer **"Create codespace on main"**

### **Étape 2 : Configuration Automatique**

**Vous verrez :**
1. **"Setting up your codespace"** - Création du container
2. **VS Code se charge** dans votre navigateur
3. **Terminal s'ouvre** avec les messages d'installation
4. **"🚀 Configuration BiblioTech pour GitHub Codespace..."**
5. **"✅ BiblioTech configuré !"** - C'est prêt !

**⏱️ Temps total : 2-3 minutes**

### **Étape 3 : Accès à l'Application**

1. **Chercher l'onglet "PORTS"** en bas de VS Code
2. **Localiser le port 8000** (BiblioTech App)
3. **Cliquer sur l'icône 🌐** à droite du port
4. **Nouvelle page s'ouvre** avec votre application Laravel

---

## 🎮 Interface VS Code Codespace

### **🗂️ Explorateur de Fichiers (Gauche)**
- **app/** - Code Laravel (contrôleurs, modèles)
- **resources/views/** - Templates Blade
- **routes/** - Définition des routes
- **database/** - Migrations, seeders (Séance 2)

### **📝 Éditeur Central**
- **Syntaxe colorée** pour PHP, Blade, JavaScript
- **Auto-complétion** Laravel et PHP
- **Extensions** pré-installées (Intelephense, Laravel Blade)

### **📋 Terminal Intégré (Bas)**
- **Terminal Bash** dans le container
- **Commandes Laravel** : `php artisan`
- **Git intégré** pour vos commits

### **🌐 Onglet PORTS (Bas)**
- **Port 8000** - Application Laravel
- **Port 8025** - MailHog (tests email)
- **Port 5432** - PostgreSQL (base de données)

---

## 🔧 Configuration Automatique

### **Services Démarrés**
```yaml
✅ Container Ubuntu avec :
   - PHP 8.2 + extensions Laravel
   - Node.js 18 + NPM
   - PostgreSQL 15
   - MailHog (test email)
   - Git + outils développement
```

### **Extensions VS Code Installées**
- **Intelephense** - Auto-complétion PHP avancée
- **Laravel Blade** - Syntaxe et snippets Blade
- **Laravel 5 Snippets** - Raccourcis Laravel
- **Laravel Artisan** - Commandes Artisan intégrées

### **Configuration Projet**
- **Dépendances installées** : Composer + NPM
- **Assets compilés** : CSS + JavaScript
- **Base de données créée** : PostgreSQL prête
- **Serveur démarré** : Laravel sur port 8000

---

## 💡 Utilisation Quotidienne

### **Démarrer votre Travail**
1. **Aller sur GitHub** → Votre repository
2. **Ouvrir votre Codespace** existant
3. **Attendre le chargement** (plus rapide après la première fois)
4. **Vérifier** que l'application fonctionne (onglet PORTS)

### **Développer**
```bash
# Commandes Laravel courantes
php artisan route:list        # Voir les routes
php artisan tinker           # Console interactive
php artisan make:controller  # Créer un contrôleur

# Voir les logs
tail -f storage/logs/laravel.log

# Git (vos modifications)
git add .
git commit -m "Mon amélioration"
git push
```

### **Tester vos Modifications**
1. **Modifier le code** dans VS Code
2. **Sauvegarder** (Ctrl+S)
3. **Actualiser** l'onglet de l'application
4. **Voir les changements** immédiatement

---

## 🌐 URLs et Accès

### **Application Principale**
- **Via PORTS** : Onglet PORTS → 🌐 port 8000
- **URL directe** : `https://[votre-codespace]-8000.app.github.dev`

### **Services Auxiliaires**
- **MailHog** : Port 8025 → Interface test email
- **Logs** : Terminal VS Code → `make logs`

### **⚠️ Important - Pas de localhost**
Dans Codespace, **N'UTILISEZ PAS** `http://localhost:8000`
→ Utilisez **toujours** l'onglet PORTS de VS Code

---

## 🔄 Gestion de votre Codespace

### **Arrêter/Reprendre**
- **Fermer l'onglet** → Codespace en pause automatique
- **Réouvrir plus tard** → Reprend où vous avez laissé
- **Timeout automatique** → 30 min d'inactivité

### **Redémarrer les Services**
```bash
# Si l'application ne répond plus
make restart

# Diagnostic complet
make check

# Réinstaller si problème
make install
```

### **Espace et Limites**
- **Gratuit** : 60h/mois pour les étudiants
- **Stockage** : 20GB par Codespace
- **Sauvegarde** : Automatique sur GitHub

---

## 🚨 Résolution de Problèmes

### **❌ Codespace ne démarre pas**
1. **Vérifier votre connexion** internet
2. **Attendre quelques minutes** et réessayer
3. **Contacter le formateur** si persistant

### **❌ Application inaccessible (port 8000)**
```bash
# Dans le terminal Codespace
make check     # Diagnostic
make restart   # Redémarrage services

# Vérifier que le serveur tourne
ps aux | grep "php artisan serve"
```

### **❌ Modifications non visibles**
1. **Vérifier sauvegarde** des fichiers (Ctrl+S)
2. **Actualiser** la page application (F5)
3. **Nettoyer cache** Laravel : `php artisan cache:clear`

### **❌ Extensions VS Code manquantes**
1. **Redémarrer** l'extension host : Ctrl+Shift+P → "Developer: Restart Extension Host"
2. **Reconstruire** le Codespace si nécessaire

---

## 🎯 Avantages pour BTS SIO SLAM

### **✅ Pour les Étudiants**
- **Zéro installation** - Fonctionne immédiatement
- **Environnement identique** - Pas de "ça marche chez moi"
- **Accessible partout** - Lycée, maison, transport
- **Pas de problème matériel** - Fonctionne sur tout appareil
- **Sauvegarde automatique** - Travail jamais perdu


---

## 🔐 Sécurité et Bonnes Pratiques

### **Données Personnelles**
- **Ne jamais stocker** de mots de passe réels dans le code
- **Utiliser .env** pour les configurations sensibles
- **Commits fréquents** pour sauvegarder votre travail

### **Utilisation Responsable**
- **Arrêter** les Codespaces non utilisés
- **Ne pas miner** de crypto-monnaies 😄
- **Respecter** les limites d'utilisation GitHub

---

## 🚀 Étapes Suivantes

### **Maintenant**
1. **✅ Vérifier** que votre Codespace fonctionne
2. **🎮 Explorer** l'application BiblioTech
3. **📖 Suivre** le [Guide Séance 1](seance-01/README.md)

### **Pour la Formation**
1. **💪 Faire** tous les exercices pratiques
2. **🤝 Collaborer** avec vos collègues via GitHub
3. **📝 Documenter** vos apprentissages



---


---

## 🛠️ Commandes essentielles pour le premier lancement

Dans le terminal intégré VS Code, exécutez :

```bash
composer install           # Installe les dépendances PHP
npm install                # Installe les dépendances JS
cp .env.example .env       # Copie le fichier d'environnement
php artisan key:generate  # Génère la clé d'application
php artisan migrate       # (optionnel) Crée les tables en base
php artisan serve         # Démarre le serveur Laravel
```

Ensuite, ouvrez l'application via l'onglet PORTS (port 8000) ou l'URL fournie.

> 💡 **Astuce** : Ajoutez cette page aux favoris pour y revenir facilement

---

## 🚀 Installation & Démarrage universelle

Utilisez les scripts suivants pour installer et démarrer le projet, quel que soit l'environnement :

```bash
bash scripts/install.sh      # Installation automatique
bash scripts/start.sh        # Démarrage du serveur Laravel
bash scripts/check.sh        # Diagnostic (optionnel)
```
- L’URL d’accès est affichée à la fin du démarrage (onglet PORTS ou https://CODESPACE_NAME-8000.app.github.dev).

**Remarques :**
- Le script `install.sh` détecte automatiquement l’environnement (Codespace, Docker, local) et configure tout.
- Le script `start.sh` attend la base de données, lance le serveur Laravel et affiche l’URL d’accès.
- Pour vérifier l’installation, utilisez `bash scripts/check.sh`.
