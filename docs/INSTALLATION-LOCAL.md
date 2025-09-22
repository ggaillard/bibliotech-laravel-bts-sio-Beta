# 🏠 Guide Installation Locale - BiblioTech

> **🎯 Installer BiblioTech sur votre machine personnelle avec Docker**

---

## 🎯 Pourquoi Installation Locale ?

**Avantages :**
- ✅ **Performance native** - Pas de latence réseau
- ✅ **Travail hors ligne** - Pas besoin d'internet constant
- ✅ **Contrôle total** - Personnalisation avancée
- ✅ **Apprentissage Docker** - Compétence professionnelle
- ✅ **Pas de limites** GitHub Codespace

**Inconvénients :**
- ⚠️ **Installation requise** - Docker, Git
- ⚠️ **Différences matériel** - Possible variations
- ⚠️ **Support plus complexe** - Environnements variés

---

## 📋 Prérequis Système

### **Windows 10/11**
- **Docker Desktop** pour Windows
- **Git** pour Windows
- **VS Code** (recommandé)
- **WSL2** activé (pour Docker)

### **macOS**
- **Docker Desktop** pour Mac
- **Git** (inclus avec Xcode Command Line Tools)
- **VS Code** (recommandé)

### **Linux (Ubuntu/Debian)**
- **Docker** + **Docker Compose**
- **Git**
- **VS Code** (recommandé)

---

## 🚀 Installation Rapide (Méthode Automatique)

### **Option 1 : Script d'Installation**

```bash
# Télécharger et installer en 1 commande
curl -sSL https://raw.githubusercontent.com/votre-org/bibliotech/main/scripts/install.sh | bash
```

**Le script fait tout :**
- Clone le repository
- Configure l'environnement
- Installe les dépendances
- Démarre les services
- Lance l'application

### **Option 2 : Makefile**

```bash
# 1. Cloner le projet
git clone https://github.com/votre-org/bibliotech.git
cd bibliotech

# 2. Installation complète
make install

# 3. Démarrage
make start
```

---

## 🔧 Installation Manuelle (Étape par Étape)

### **Étape 1 : Installation des Outils**

#### **Windows**
```powershell
# Télécharger et installer :
# 1. Docker Desktop : https://www.docker.com/products/docker-desktop
# 2. Git : https://git-scm.com/download/win
# 3. VS Code : https://code.visualstudio.com/

# Vérifier l'installation
docker --version
git --version
```

#### **macOS**
```bash
# Avec Homebrew (recommandé)
brew install git
brew install --cask docker
brew install --cask visual-studio-code

# Vérifier l'installation
docker --version
git --version
```

#### **Linux (Ubuntu/Debian)**
```bash
# Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh
sudo usermod -aG docker $USER

# Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Git et outils
sudo apt update
sudo apt install git curl wget

# Redémarrer la session
logout
```

### **Étape 2 : Cloner le Projet**

```bash
# Cloner depuis GitHub
git clone https://github.com/votre-org/bibliotech.git

# Entrer dans le répertoire
cd bibliotech

# Vérifier les fichiers
ls -la
```

### **Étape 3 : Configuration Environnement**

```bash
# Copier le fichier de configuration
cp .env.example .env

# Modifier si nécessaire (optionnel pour débuter)
# nano .env
```

### **Étape 4 : Lancement Docker**

```bash
# Construire et démarrer tous les services
docker-compose -f docker/docker-compose.yml up -d --build

# Vérifier que les services tournent
docker-compose -f docker/docker-compose.yml ps
```

### **Étape 5 : Installation Dépendances**

```bash
# Entrer dans le container de l'application
docker-compose -f docker/docker-compose.yml exec app bash

# Dans le container, installer les dépendances
composer install --no-interaction --optimize-autoloader
npm install
npm run build

# Configuration Laravel
php artisan key:generate --no-interaction
php artisan storage:link --no-interaction
php artisan config:cache

# Sortir du container
exit
```

### **Étape 6 : Vérification**

```bash
# Test automatique
make check

# Test manuel
# Ouvrir http://localhost:8000 dans votre navigateur
```

---

## 🌐 Accès aux Services

### **URLs Locales**
- **Application** : http://localhost:8000
- **MailHog** : http://localhost:8025
- **Adminer (BDD)** : http://localhost:8080

### **Ports Utilisés**
```
8000  - Application Laravel
8025  - MailHog (interface email)
8080  - Adminer (gestion BDD)
5432  - PostgreSQL (base de données)
```

### **Vérification des Ports**
```bash
# Voir quels ports sont utilisés
netstat -tulpn | grep :8000
netstat -tulpn | grep :5432

# Ou sur macOS
lsof -i :8000
lsof -i :5432
```

---

## 🛠 Commandes de Gestion

### **Services Docker**
```bash
# Démarrer tous les services
make start
# ou
docker-compose -f docker/docker-compose.yml up -d

# Arrêter tous les services
make stop
# ou
docker-compose -f docker/docker-compose.yml down

# Voir les logs
make logs
# ou
docker-compose -f docker/docker-compose.yml logs -f

# Reconstruire les images
docker-compose -f docker/docker-compose.yml build --no-cache
```

### **Développement**
```bash
# Terminal dans le container Laravel
make shell
# ou
docker-compose -f docker/docker-compose.yml exec app bash

# Commandes Laravel Artisan
make artisan cmd="route:list"
# ou
docker-compose -f docker/docker-compose.yml exec app php artisan route:list

# Compilation assets en mode watch
docker-compose -f docker/docker-compose.yml exec app npm run dev
```

---

## 🔄 Workflow de Développement

### **Session de Travail Typique**

1. **Démarrer l'environnement**
   ```bash
   cd bibliotech
   make start
   ```

2. **Ouvrir VS Code**
   ```bash
   code .
   ```

3. **Développer**
   - Modifier les fichiers dans VS Code
   - Tester dans le navigateur (http://localhost:8000)
   - Utiliser les commandes Artisan si nécessaire

4. **Arrêter en fin de session**
   ```bash
   make stop
   ```

### **Modifications Courantes**

**Routes :** `routes/web.php`
```php
Route::get('/nouvelle-route', [Controller::class, 'method'])->name('route.name');
```

**Contrôleurs :** `app/Http/Controllers/`
```bash
# Créer un nouveau contrôleur
make artisan cmd="
