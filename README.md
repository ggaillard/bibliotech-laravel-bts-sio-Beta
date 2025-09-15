# 📚 BiblioTech - Application Laravel Éducative

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php)](https://php.net)
[![Docker](https://img.shields.io/badge/Docker-Ready-blue?style=for-the-badge&logo=docker)](https://docker.com)
[![GitHub Codespaces](https://img.shields.io/badge/Codespaces-Ready-green?style=for-the-badge&logo=github)](https://github.com/features/codespaces)
[![BTS SIO](https://img.shields.io/badge/BTS-SIO_SLAM-orange?style=for-the-badge)](https://www.onisep.fr/Ressources/Univers-Formation/Formations/Post-bac/bts-services-informatiques-aux-organisations-option-b-solutions-logicielles-et-applications-metiers)

> **Application de gestion de bibliothèque** développée avec Laravel 11 dans le cadre de la formation **BTS SIO SLAM**. Parfaite pour apprendre les concepts fondamentaux du développement web moderne avec un environnement containerisé Docker et GitHub Codespaces.

## 🎯 **Objectifs Pédagogiques**

### **Formation BTS SIO SLAM - 8 Séances Progressives**

| 🎓 Séance | 📚 Concepts Clés | 🛠️ Technologies |
|-----------|------------------|------------------|
| **S1** | MVC, Routes, Blade | Laravel, Docker, GitHub Codespaces |
| **S2** | Base de données, Migrations | PostgreSQL, Eloquent ORM |
| **S3** | CRUD, Formulaires | Validation, Sessions, Flash Messages |
| **S4** | Authentification, Sécurité | Laravel Auth, Middleware |
| **S5** | Relations, APIs | Relations Eloquent, API REST |
| **S6** | Recherche, Performance | Elasticsearch, Cache, Queues |
| **S7** | Technologies Avancées | QR Codes, WebSockets |
| **S8** | Déploiement, Production | CI/CD, Monitoring, Scalabilité |

### **Compétences BTS SIO Validées**
- ✅ **E4 - Conception et Développement** : Architecture MVC, Développement full-stack
- ✅ **E5 - Gestion de Projet** : Git, Docker, Documentation, Tests
- ✅ **E6 - Parcours de Professionnalisation** : Veille technologique, Collaboration

## 🚀 **Démarrage Rapide**

### **Option 1 : GitHub Codespaces (Recommandé) 🌟**

```bash
# 1. Cliquez sur "Code" > "Create codespace on main"
# 2. Attendez la configuration automatique (2-3 minutes)
# 3. L'application se lance automatiquement sur http://localhost:8000
```

**🎉 C'est tout ! Votre environnement est prêt en 3 clics.**

### **Option 2 : Installation Locale avec Docker**

```bash
# Cloner le projet
git clone https://github.com/votre-username/bibliotech-laravel-bts-sio.git
cd bibliotech-laravel-bts-sio

# Copier et configurer l'environnement
cp .env.example .env

# Démarrer avec Docker Compose
docker-compose up -d

# Installation et configuration automatique
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
docker-compose exec app npm install && npm run build
```

## 🌐 **Services Intégrés**

| 🌐 Service | 📍 URL | 📝 Description |
|------------|--------|----------------|
| **BiblioTech** | `http://localhost:8000` | Application principale Laravel |
| **MailHog** | `http://localhost:8025` | Interface de test des emails |
| **Adminer** | `http://localhost:8080` | Interface de gestion PostgreSQL |
| **Base de Données** | `localhost:5432` | PostgreSQL (connexion directe) |

## 📁 **Architecture du Projet**

```
BiblioTech/
├── 📁 .devcontainer/           # Configuration GitHub Codespaces
│   ├── devcontainer.json       # Config environnement
│   ├── docker-compose.yml      # Services Docker
│   └── setup.sh               # Script d'installation
├── 📁 .github/                # Templates et workflows
│   ├── workflows/             # CI/CD automatisé
│   └── ISSUE_TEMPLATE/        # Templates questions étudiants
├── 📁 app/                    # Code source Laravel
│   ├── Http/Controllers/      # Contrôleurs MVC
│   │   ├── HomeController.php # Page d'accueil
│   │   └── BookController.php # Gestion des livres
│   ├── Models/               # Modèles Eloquent
│   │   └── Book.php          # Modèle Livre
│   └── Services/             # Services métier
├── 📁 resources/             # Frontend et vues
│   ├── views/               # Templates Blade
│   │   ├── layouts/         # Layouts principaux
│   │   ├── books/          # Vues des livres
│   │   └── components/     # Composants réutilisables
│   ├── js/                 # JavaScript/Vue.js
│   └── scss/               # Styles SCSS
├── 📁 database/             # Base de données
│   ├── migrations/         # Migrations SQL
│   ├── seeders/           # Données de démonstration
│   └── factories/         # Factories pour tests
├── 📁 docs/                # Documentation séances
│   ├── seance-01/         # Séance 1 : Fondations
│   ├── seance-02/         # Séance 2 : BDD + CI/CD
│   ├── ...                # Autres séances
│   ├── PROGRESSION.md     # Progression complète
│   └── TROUBLESHOOTING.md # Guide de dépannage
├── 📁 tests/              # Tests automatisés
│   ├── Feature/          # Tests fonctionnels
│   └── Unit/             # Tests unitaires
└── 📄 README.md          # Ce fichier
```

## 🎮 **Fonctionnalités Intégrées**

### **📚 Gestion de Bibliothèque**
- 🏠 **Page d'accueil** avec statistiques temps réel
- 📖 **Catalogue de livres** (5 livres de démonstration)
- 🔍 **Recherche avancée** par titre, auteur, genre
- 📱 **Interface responsive** (mobile-first)
- 📊 **Tableaux de bord** administrateur

### **🔧 Outils de Développement**
- 🐳 **Environnement Docker** complet
- 📧 **MailHog** pour tests d'emails
- 🗄️ **Adminer** pour gestion BDD
- 🔄 **Hot Reload** avec Vite
- 🧪 **Tests automatisés** Feature + Unit

### **📚 Ressources Pédagogiques**
- 📖 **Documentation progressive** (8 séances)
- 🧠 **Concepts expliqués** simplement
- 💪 **Exercices pratiques** avec solutions
- 🎯 **Évaluations** par compétences
- 🆘 **Guide de dépannage** complet

## 🧠 **Guide de Formation**

### **🎓 Pour les Étudiants**

1. **Commencer par la Séance 1** : [docs/seance-01/README.md](docs/seance-01/README.md)
2. **Comprendre les concepts** : [docs/seance-01/CONCEPTS-MVC.md](docs/seance-01/CONCEPTS-MVC.md)
3. **Maîtriser le vocabulaire** : [docs/seance-01/GLOSSAIRE-LARAVEL.md](docs/seance-01/GLOSSAIRE-LARAVEL.md)
4. **Pratiquer avec les TP** : [docs/seance-01/TP-DECOUVERTE-APP.md](docs/seance-01/TP-DECOUVERTE-APP.md)
5. **S'évaluer** : [docs/seance-01/EVALUATION-COMPETENCES.md](docs/seance-01/EVALUATION-COMPETENCES.md)

### **👨‍🏫 Pour les Formateurs**

- 📋 **Progression complète** : [docs/PROGRESSION.md](docs/PROGRESSION.md)
- 🎯 **Correspondance BTS** : [docs/REFERENTIEL-BTS.md](docs/REFERENTIEL-BTS.md)
- 📊 **Grilles d'évaluation** intégrées
- 🔧 **Outils de suivi** et statistiques

## 🛠️ **Commandes Utiles**

### **Laravel Artisan**
```bash
# Lister toutes les routes
php artisan route:list

# Console interactive
php artisan tinker

# Nettoyer les caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Créer des éléments
php artisan make:controller BookController --resource
php artisan make:model Book -m
php artisan make:seeder BookSeeder
```

### **Docker & Services**
```bash
# Démarrer tous les services
docker-compose up -d

# Voir les logs en temps réel
docker-compose logs -f

# Accéder au conteneur de l'application
docker-compose exec app bash

# Arrêter tous les services
docker-compose down
```

### **Frontend & Assets**
```bash
# Compilation en mode développement
npm run dev

# Compilation avec surveillance
npm run watch

# Compilation pour production
npm run build

# Tests frontend
npm run test
```

### **Tests & Qualité**
```bash
# Lancer tous les tests
php artisan test

# Tests avec couverture
php artisan test --coverage

# Tests spécifiques
php artisan test --filter BookTest

# Analyse statique
./vendor/bin/phpstan analyse
```

## 🤝 **Contribuer au Projet**

### **🙋‍♀️ Poser une Question**
Utilisez les [templates d'issues](.github/ISSUE_TEMPLATE/) pour poser vos questions :
- 🤔 **Question formation** : Concepts, exercices, fonctionnalités
- 🐛 **Bug report** : Signaler un problème technique
- 💡 **Suggestion** : Proposer une amélioration

### **🔄 Proposer des Améliorations**
1. **Fork** le projet
2. **Créer une branche** : `git checkout -b feature/amazing-feature`
3. **Commit** : `git commit -m 'Add amazing feature'`
4. **Push** : `git push origin feature/amazing-feature`
5. **Pull Request** avec description détaillée

### **📝 Standards de Code**
- **PSR-12** pour le code PHP
- **ESLint** pour JavaScript
- **Blade** formaté et indenté
- **Documentation** des nouvelles fonctionnalités

## 🔧 **Dépannage**

### **Problèmes Courants**

| 🚨 Problème | 🔧 Solution |
|-------------|-------------|
| Port 8000 occupé | `php artisan serve --port=8001` |
| Erreur 500 | Vérifier les logs : `tail -f storage/logs/laravel.log` |
| Assets non compilés | `npm run build` puis `php artisan config:clear` |
| Base de données vide | `php artisan migrate:fresh --seed` |
| Permissions Docker | `sudo chown -R $USER:$USER storage bootstrap/cache` |

### **🆘 Guide Complet**
Consultez le [guide de dépannage détaillé](docs/TROUBLESHOOTING.md) pour plus de solutions.

## 📊 **Statistiques du Projet**

- 📈 **Progression** : 8 séances structurées
- 🎯 **Compétences** : 15+ compétences BTS validées
- 🧪 **Tests** : 50+ tests automatisés
- 📖 **Documentation** : 100+ pages de guides
- 🎮 **Exercices** : 30+ exercices pratiques

## 📄 **Licence et Crédits**

### **📜 Licence**

[![Creative Commons License](https://i.creativecommons.org/l/by-sa/4.0/88x31.png)](http://creativecommons.org/licenses/by-sa/4.0/)  
*Projet éducatif libre sous licence CC BY-SA 4.0*

## 🔗 **Liens Utiles**

### **📚 Documentation Officielle**
- [Laravel Documentation](https://laravel.com/docs/11.x)
- [Docker Docs](https://docs.docker.com/)
- [GitHub Codespaces](https://docs.github.com/en/codespaces)
- [Bootstrap](https://getbootstrap.com/docs/5.3/)



### **💡 Veille Technologique**
- [Laravel News](https://laravel-news.com/)
- [PHP Weekly](https://www.phpweekly.com/)
- [GitHub Trending](https://github.com/trending/php)

---


**⭐ N'oubliez pas de mettre une étoile si ce projet vous aide ! ⭐**


[🚀 Commencer](docs/seance-01/README.md) | [📚 Documentation](docs/) | [🤝 Contribuer](.github/CONTRIBUTING.md) | [🆘 Support](https://github.com/votre-username/bibliotech-laravel-bts-sio/issues)

