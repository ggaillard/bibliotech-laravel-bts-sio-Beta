# 📚 BiblioTech - Séance 1 : Fondations

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?style=flat-square&logo=php)
![Séance](https://img.shields.io/badge/Séance-1/8-success?style=flat-square)
![Status](https://img.shields.io/badge/Status-🟢_Disponible-green?style=flat-square)

## 🎯 **Séance 1 : 🏗️ Fondations (MVC + Blade + Routes)**

**Durée :** 3h  
**Focus :** Architecture MVC, Routes Laravel, Templates Blade  
**Niveau :** Débutant  
**Prérequis :** Aucun

---

## 🚀 **Démarrage Ultra-Rapide**

### **Option 1 : GitHub Codespace (Recommandé)**
1. **Cliquez sur le bouton vert "Code"**
2. **Onglet "Codespaces"** → "Create codespace on main"
3. **Attendez 2-3 minutes** - Configuration automatique
4. **Accédez à http://localhost:8000** quand ready ✅

### **Option 2 : Docker Local**
```bash
git clone [repository-url]
cd bibliotech-laravel-bts-sio
docker-compose up -d
# Attendez puis : http://localhost:8000
```

---

## 📍 **Navigation de l'Application**

| Page | URL | Concept Enseigné |
|------|-----|------------------|
| **🏠 Accueil** | `/` | Route simple + Contrôleur + Données |
| **📖 Catalogue** | `/livres` | Route nommée + Liste + Boucle Blade |
| **🔍 Détail Livre** | `/livre/{id}` | Route paramètre + Logique contrôleur |
| **ℹ️ À propos** | `/about` | Route directe vers vue |

---

## 🎯 **Objectifs de la Séance 1**

À la fin de cette séance, vous maîtriserez :

### **✅ Architecture MVC**
- [ ] Comprendre Model-View-Controller
- [ ] Identifier le rôle de chaque couche
- [ ] Tracer le flux d'une requête HTTP

### **✅ Routes Laravel**
- [ ] Définir des routes dans `routes/web.php`
- [ ] Utiliser des paramètres d'URL `{id}`
- [ ] Nommer les routes avec `->name()`
- [ ] Générer des URLs avec `route()`

### **✅ Contrôleurs**
- [ ] Créer un contrôleur avec Artisan
- [ ] Organiser la logique métier
- [ ] Passer des données aux vues

### **✅ Templates Blade**
- [ ] Créer un layout avec `@extends`/`@yield`
- [ ] Utiliser l'héritage de templates
- [ ] Afficher des variables avec `{{ }}`
- [ ] Utiliser les boucles `@foreach`

---

## 📚 **Structure du Code (Séance 1)**

```
🛣️ Routes (routes/web.php)
├── / → HomeController@index (Accueil)
├── /about → Vue directe (À propos)  
├── /livres → BookController@index (Liste)
└── /livre/{id} → BookController@show (Détail)

🎮 Contrôleurs (app/Http/Controllers/)
├── HomeController → Données stats + accueil
└── BookController → Livres statiques (3 livres)

🎨 Vues (resources/views/)
├── layouts/app.blade.php → Layout principal
├── welcome.blade.php → Page accueil
├── about.blade.php → Page à propos
└── books/
	├── index.blade.php → Liste des livres
	└── show.blade.php → Détail d'un livre
```

---

## 💻 **Commandes Utiles**

```bash
# Voir les routes définies
php artisan route:list

# Nettoyer les caches
php artisan config:clear
php artisan route:clear  
php artisan view:clear

# Créer un contrôleur (pour exercices)
php artisan make:controller MonController

# Arrêter/Démarrer Docker
docker-compose down
docker-compose up -d
```

---

## 🎓 **Exercices Pratiques**

### **Exercice 1 : Nouvelle Route**
Ajoutez une page "Contact" :
- Route : `/contact`
- Vue : `resources/views/contact.blade.php`
- Navigation dans le menu

### **Exercice 2 : Paramètre Route**
Créez une route `/livre/{id}/auteur` qui affiche seulement l'auteur

### **Exercice 3 : Données Contrôleur**
Ajoutez 2 nouveaux livres dans `BookController`

### **Exercice 4 : Template Blade**
Créez un composant `@include` pour les cartes de livres

---

## 📖 **Documentation**

- 📋 **[Guide Complet Séance 1](docs/SEANCE-1/README.md)**
- 🧠 **[Concepts MVC expliqués](docs/SEANCE-1/CONCEPTS.md)**
- 💪 **[Exercices pratiques](docs/SEANCE-1/EXERCICES.md)**
- ✅ **[Auto-évaluation](docs/SEANCE-1/EVALUATION.md)**

---

## 🚨 **Support & Aide**

- 🐛 **Bug ou erreur :** [Créer une issue](../../issues)
- ❓ **Question cours :** Demander au formateur
- 📚 **Laravel Docs :** https://laravel.com/docs

---

## 🎯 **Prochaines Séances**

| Séance | Titre | Focus | Status |
|--------|-------|-------|--------|
| **2** | 🗄️ Base de Données | Eloquent + Migrations + CI/CD | 🔒 Bientôt |
| **3** | ✏️ CRUD + Gamification | Formulaires + Points/Badges | 🔒 Bientôt |
| **4** | 🔐 Auth + WebSockets | Sécurité + Temps Réel | 🔒 Bientôt |
| **5** | 🔗 Relations + IA | Eloquent Avancé + OpenAI | 🔒 Bientôt |
| **6** | 🔍 Recherche + Code Quality | UX + SonarQube + Mentoring | 🔒 Bientôt |
| **7** | 📱 QR/AR + Analytics | Technologies Immersives | 🔒 Bientôt |
| **8** | 🚀 API + Production | Déploiement + Performance | 🔒 Bientôt |

---

**🎯 Prêt à découvrir Laravel ? Lancez votre environnement et explorez ! 🚀**

⭐ **N'oubliez pas l'étoile si cette formation vous aide !**
# 📚 BiblioTech - Formation Laravel BTS SIO SLAM

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?style=flat-square&logo=php)
![GitHub Codespaces](https://img.shields.io/badge/GitHub-Codespaces-success?style=flat-square&logo=github)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-15-blue?style=flat-square&logo=postgresql)

## 🎯 **Formation Progressive Laravel - 8 Séances**

Formation complète Laravel pour BTS SIO SLAM avec environnement de développement cloud intégré.

**🎓 Objectif :** Passer de débutant à expert Laravel en 24h de formation progressive

## 🚀 **Démarrage Ultra-Rapide (30 secondes)**

### **📱 Avec GitHub Codespace (Recommandé)**

1. **Cliquez sur le bouton vert "< > Code"** ↗️
2. **Sélectionnez l'onglet "Codespaces"**
3. **Cliquez "Create codespace on main"** 
4. **☕ Attendez 2-3 minutes** - L'application se configure automatiquement
5. **🌐 Accédez à l'application** quand vous voyez "✅ BiblioTech est prêt !"

```bash
# Votre terminal affichera :
✅ BiblioTech est prêt !
🌐 Application : http://localhost:8000
📧 MailHog : http://localhost:8025
📚 Documentation : docs/SEANCE-1/README.md
```

> **💡 Astuce :** Le navigateur s'ouvrira automatiquement sur l'application

## 📅 **Programme des 8 Séances**

| Séance | Titre | Compétences Clés | Durée | Status |
|--------|-------|------------------|-------|---------|
| **1** | **🏗️ Fondations** | **MVC + Blade + Routes** | **3h** | **🟢 Disponible** |
| 2 | 🗄️ Base de Données | Eloquent + Migrations + CI/CD | 3h | 🔒 Séance 2 |
| 3 | ✏️ CRUD + Gamification | Formulaires + Points/Badges | 3h | 🔒 Séance 3 |
| 4 | 🔐 Auth + WebSockets | Sécurité + Temps Réel | 3h | 🔒 Séance 4 |
| 5 | 🔗 Relations + IA | Eloquent Avancé + OpenAI | 3h | 🔒 Séance 5 |
| 6 | 🔍 Recherche + Code Quality | UX + SonarQube + Mentoring | 3h | 🔒 Séance 6 |
| 7 | 📱 QR/AR + Analytics | Technologies Immersives | 3h | 🔒 Séance 7 |
| 8 | 🚀 API + Production | Déploiement + Performance | 3h | 🔒 Séance 8 |

## 🎯 **Séance 1 : Fondations Laravel + Docker**

### **🎓 Approche Pédagogique Équilibrée :**
- **1h30 Classique :** MVC, Routes, Contrôleurs, Vues Blade
- **1h30 Innovant :** Containerisation Docker, environnement reproductible

### **Ce que vous allez apprendre :**
✅ **Architecture MVC** : Comprendre Model, View, Controller  
✅ **Routes Laravel** : Créer et organiser vos URLs  
✅ **Contrôleurs** : Gérer la logique de votre application  
✅ **Templates Blade** : Créer des vues élégantes et réutilisables  
✅ **Docker** : Environnement de développement professionnel  
✅ **GitHub Codespace** : Développement cloud moderne  

### **Application fonctionnelle incluse :**
- 🏠 **Page d'accueil** avec statistiques en temps réel
- 📚 **Catalogue de livres** (5 livres de démonstration)
- 📖 **Pages détails** avec informations complètes
- 🔍 **Recherche simple** par titre ou auteur
- 📱 **Interface responsive** (fonctionne sur mobile)
- 🐳 **Infrastructure Docker** complète

## 📚 **Navigation Documentation**

### **🎓 Pour Commencer (Séance 1)**
- 🚀 **[Guide de Démarrage](docs/SEANCE-1/README.md)** - Premiers pas essentiels
- 🧠 **[Concepts MVC](docs/SEANCE-1/CONCEPTS.md)** - Comprendre l'architecture
- 📖 **[Glossaire Technique](docs/SEANCE-1/GLOSSAIRE.md)** - Vocabulaire Laravel
- 💪 **[Exercices Pratiques](docs/SEANCE-1/EXERCICES.md)** - Mise en pratique
- ✅ **[Auto-évaluation](docs/SEANCE-1/EVALUATION.md)** - Vérifier ses acquis

### **📋 Ressources Générales**
- 🗺️ **[Progression Complète](docs/PROGRESSION.md)** - Vue d'ensemble 8 séances
- 🎓 **[Référentiel BTS SIO](docs/REFERENTIEL-BTS.md)** - Correspondance programme
- 🆘 **[Guide Dépannage](docs/TROUBLESHOOTING.md)** - Solutions problèmes courants

## 🌐 **Services Disponibles**

Une fois votre Codespace lancé, vous aurez accès à :

| 🌐 Service | 📍 URL | 📝 Description |
|------------|--------|----------------|
| **BiblioTech** | `http://localhost:8000` | Application principale Laravel |
| **MailHog** | `http://localhost:8025` | Interface de test des emails |
| **Base de Données** | `localhost:5432` | PostgreSQL (connexion via client) |

> **🔗 Les URLs s'ouvrent automatiquement** grâce à la configuration Codespace

## 🎮 **Fonctionnalités Intégrées (
