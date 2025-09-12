# 📁 Structure Minimale - Séance 1 : Fondations Laravel + Docker

## 🎯 **Fichiers Strictement Nécessaires pour Séance 1**

```
bibliotech-laravel-bts-sio/
├── 📄 README.md                           # Guide principal Codespace
├── 📄 .gitignore                         # Laravel + Docker + Codespace
├── 📄 .env.example                       # Variables d'environnement
├── 📄 composer.json                      # Laravel 11 + dépendances S1
├── 📄 package.json                       # NPM Bootstrap + Vite
├── 📄 vite.config.js                     # Configuration build frontend
├── 📄 artisan                            # CLI Laravel
├── 📄 phpunit.xml                        # Configuration tests Laravel
├── 📄 .editorconfig                      # Configuration éditeur
│
├── 📁 .devcontainer/                     # Configuration GitHub Codespace
│   ├── 📄 devcontainer.json             # Config principale Codespace
│   ├── 📄 docker-compose.yml            # Services Docker
│   ├── 📄 Dockerfile                    # Image Laravel personnalisée
│   ├── 📄 setup.sh                      # Script installation automatique
│   ├── 📄 start.sh                      # Script démarrage serveur
│   ├── 📄 apache.conf                   # Configuration Apache
│   └── 📄 init-db.sql                   # Initialisation PostgreSQL
│
├── 📁 .github/                          # Templates GitHub
│   └── 📁 ISSUE_TEMPLATE/               # Templates issues
│       ├── 📄 question-seance.md        # Questions étudiants
│       └── 📄 bug-report.md             # Rapport de bugs
│
├── 📁 app/                              # Code Laravel application
│   ├── 📁 Http/
│   │   └── 📁 Controllers/
│   │       ├── 📄 Controller.php        # Contrôleur base Laravel
│   │       └── 📄 BookController.php    # Contrôleur livres complet
│   ├── 📁 Models/
│   │   ├── 📄 User.php                  # Modèle User Laravel
│   │   └── 📄 Book.php                  # Modèle Book (vide pour S1)
│   └── 📁 Providers/
│       └── 📄 AppServiceProvider.php    # Provider principal Laravel
│
├── 📁 bootstrap/                        # Bootstrap Laravel
│   ├── 📄 app.php                       # Bootstrap application
│   └── 📁 cache/
│       └── 📄 .gitkeep                  # Maintenir dossier vide
│
├── 📁 config/                           # Configuration Laravel
│   ├── 📄 app.php                       # Config app (nom BiblioTech)
│   └── 📄 database.php                  # Config DB (PostgreSQL)
│
├── 📁 database/                         # Base de données (préparé pour S2)
│   ├── 📁 factories/
│   │   └── 📄 .gitkeep                  # Maintenir dossier vide
│   ├── 📁 migrations/
│   │   └── 📄 .gitkeep                  # Maintenir dossier vide
│   └── 📁 seeders/
│       └── 📄 .gitkeep                  # Maintenir dossier vide
│
├── 📁 public/                           # Assets publics
│   ├── 📄 index.php                     # Point d'entrée Laravel
│   └── 📄 .htaccess                     # Configuration Apache
│
├── 📁 resources/                        # Ressources frontend
│   ├── 📁 css/
│   │   └── 📄 app.css                   # Styles principaux
│   ├── 📁 js/
│   │   ├── 📄 app.js                    # JavaScript principal
│   │   └── 📄 bootstrap.js              # Bootstrap JS Laravel
│   └── 📁 views/                        # Templates Blade
│       ├── 📁 layouts/
│       │   └── 📄 app.blade.php         # Layout principal complet
│       ├── 📄 welcome.blade.php         # Page d'accueil complète
│       ├── 📄 about.blade.php           # Page à propos
│       ├── 📁 books/
│       │   ├── 📄 index.blade.php       # Liste livres complète
│       │   ├── 📄 show.blade.php        # Détail livre complet
│       │   └── 📄 search.blade.php      # Recherche complète
│       └── 📁 demo/
│           └── 📄 hello.blade.php       # Démo paramètres routes
│
├── 📁 routes/                           # Définition des routes
│   └── 📄 web.php                       # Routes web complètes S1
│
├── 📁 storage/                          # Stockage Laravel
│   ├── 📁 app/
│   │   └── 📁 public/
│   │       └── 📄 .gitkeep              # Maintenir dossier vide
│   ├── 📁 framework/
│   │   ├── 📁 cache/
│   │   │   └── 📄 .gitkeep              # Maintenir dossier vide
│   │   ├── 📁 sessions/
│   │   │   └── 📄 .gitkeep              # Maintenir dossier vide
│   │   └── 📁 views/
│   │       └── 📄 .gitkeep              # Maintenir dossier vide
│   └── 📁 logs/
│       └── 📄 .gitkeep                  # Maintenir dossier vide
│
└── 📁 docs/                             # Documentation formation
    └── 📁 SEANCE-1/                     # Documentation Séance 1
        ├── 📄 README.md                 # Guide séance 1 complet
        ├── 📄 CONCEPTS.md               # Concepts MVC/Laravel/Docker
        ├── 📄 GLOSSAIRE.md              # Vocabulaire technique S1
        ├── 📄 EXERCICES.md              # 5 exercices pratiques
        └── 📄 EVALUATION.md             # Grille évaluation complète
```

! 🎯
