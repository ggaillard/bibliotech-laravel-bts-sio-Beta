# 📋 PROGRESSION - Formation Laravel BiblioTech

> **Plan de cours simple** pour 8 séances de 3h

---

## 🎯 **VUE D'ENSEMBLE**

### **📊 Résumé Formation**
- **Durée** : 24h (8 séances × 3h)
- **Public** : BTS SIO SLAM
- **Projet** : Application BiblioTech (gestion bibliothèque)
- **Environnement** : GitHub Codespace (tout inclus)

### **🏆 Objectif Final**
À la fin, chaque étudiant a une application Laravel complète et fonctionnelle qu'il peut présenter en entretien d'embauche.

---

## 📅 **PROGRAMME DÉTAILLÉ**

### **🎯 SÉANCE 1 : Fondations (3h)**
**Objectif** : Comprendre Laravel et créer ses premières pages

#### **Contenu**
- **MVC** : Model-View-Controller expliqué simplement
- **Routes** : Créer URLs pour accéder aux pages
- **Blade** : Templates pour afficher les pages
- **Docker** : Environnement de développement

#### **Exercices**
- Créer route `/contact`
- Afficher liste des livres
- Personnaliser page d'accueil
- Navigation entre pages

#### **Validation**
- Application fonctionne localement
- 3 routes créées et fonctionnelles
- Compréhension flux : URL → Contrôleur → Vue

---

### **🗄️ SÉANCE 2 : Base de Données (3h)**
**Objectif** : Remplacer les données en dur par une vraie base de données

#### **Contenu**
- **Migrations** : Créer tables de données
- **Modèles Eloquent** : Interagir avec la BDD en PHP
- **Relations** : Liens entre tables (livre → catégorie)
- **Seeders** : Remplir la BDD avec des données de test

#### **Exercices**
 - Créer table `livres` et `categories`
 - Modèles `Livre` et `Catégorie` avec relations
- Afficher livres depuis BDD
- Ajouter données via seeders

#### **Validation**
- PostgreSQL fonctionnel
- Données affichées depuis BDD
- Relations entre livres et catégories

---

### **✏️ SÉANCE 3 : CRUD + Formulaires (3h)**
**Objectif** : Permettre d'ajouter, modifier, supprimer des livres

#### **Contenu**
- **CRUD** : Create, Read, Update, Delete
- **Formulaires HTML** : Saisie de données
- **Validation** : Vérifier les données saisies
- **Messages flash** : Retours utilisateur

#### **Exercices**
- Formulaire d'ajout de livre
- Page modification livre existant
- Suppression avec confirmation
- Validation des champs obligatoires

#### **Validation**
- Toutes opérations CRUD fonctionnelles
- Validation côté serveur active
- Messages d'erreur/succès affichés

---

### **🔐 SÉANCE 4 : Authentification (3h)**
**Objectif** : Système de connexion utilisateurs

#### **Contenu**
- **Register/Login** : Inscription et connexion
- **Sessions** : Maintenir utilisateur connecté
- **Middleware** : Protéger certaines pages
- **Rôles** : Admin vs utilisateur normal

#### **Exercices**
- Pages inscription/connexion
- Protection page admin
- Affichage conditionnel selon rôle
- Déconnexion

#### **Validation**
- Système auth complet
- Pages protégées fonctionnelles
- Différenciation admin/utilisateur

---

### **🔗 SÉANCE 5 : Relations + API (3h)**
**Objectif** : Données complexes et API pour mobile

#### **Contenu**
- **Relations avancées** : Many-to-many (auteurs ↔ livres)
- **API REST** : Endpoints JSON
- **Postman** : Tester l'API
- **Sanctum** : Authentification API

#### **Exercices**
 - Table pivot `auteur_livre`
 - Points d'API `/api/livres`
- Tests API avec Postman
- Protection API par tokens

#### **Validation**
- Relations complexes fonctionnelles
- API REST opérationnelle
- Tests API passent

---

### **🔍 SÉANCE 6 : Recherche + Performance (3h)**
**Objectif** : Optimiser l'application

#### **Contenu**
- **Recherche fulltext** : Chercher dans titre/auteur/contenu
- **Pagination** : Diviser résultats par pages
- **Cache** : Accélérer l'application
- **Optimisation requêtes** : N+1 queries

#### **Exercices**
- Barre de recherche fonctionnelle
- Pagination des résultats
- Mise en cache des catégories
- Optimisation page livres

#### **Validation**
- Recherche rapide et pertinente
- Navigation pagination fluide
- Performance améliorée mesurable

---

### **🚀 SÉANCE 7 : Technologies Avancées (3h)**
**Objectif** : Fonctionnalités innovantes

#### **Contenu**
- **QR Codes** : Génération pour chaque livre
- **API IA** : Recommandations via OpenAI
- **WebSockets** : Notifications temps réel
- **PWA** : Application mobile-like

#### **Exercices**
- QR code sur page livre
- Recommandations IA basées sur historique
- Notifications emprunts temps réel
- Installation app sur mobile

#### **Validation**
- Au moins 2 features avancées implémentées
- QR codes fonctionnels
- Intégration IA basique

---

### **🌐 SÉANCE 8 : Production (3h)**
**Objectif** : Déployer l'application en ligne

#### **Contenu**
- **Tests automatisés** : Vérifier que tout marche
- **CI/CD Pipeline** : Déploiement automatique
- **Hébergement** : Mettre en ligne
- **Monitoring** : Surveillance erreurs

#### **Exercices**
- Tests unitaires et fonctionnels
- Pipeline GitHub Actions
- Déploiement Heroku/DigitalOcean
- Configuration SSL + domaine

#### **Validation**
- Application en ligne et accessible
- Tests automatiques passent
- Pipeline déploiement fonctionne

---

## 📊 **PRÉREQUIS PAR SÉANCE**

| Séance | Prérequis Étudiant | Prérequis Formateur |
|--------|-------------------|-------------------|
| **1** | Bases HTML/CSS | Connaître Laravel basique |
| **2** | S1 validée | Tester migrations |
| **3** | S2 validée | Exemples validation |
| **4** | S3 validée | Démo auth Laravel |
| **5** | S4 validée | API Postman préparée |
| **6** | S5 validée | Benchmarks performance |
| **7** | S6 validée | Comptes APIs (OpenAI) |
| **8** | S7 validée | Hébergement configuré |

---

## 🎯 **VALIDATION DE PASSAGE**

### **Critères pour passer à la séance suivante**
- **Note ≥ 12/20** à l'évaluation séance
- **Exercices principaux** terminés et fonctionnels
- **Compréhension concepts** vérifiée (questions/réponses)

---


## 🔄 **ADAPTATION POSSIBLE**

### **Si groupe avancé**
- Exercices bonus chaque séance
- Séance 7 peut inclure plus de technologies
- Projet personnel libre en parallèle

### **Si groupe en difficulté**
- Réduire contenu séances 7-8
- Plus d'exercices guidés
- Sessions rattrapage intermédiaires

---



🎯 **Cette progression garantit une montée en compétences régulière et maîtrisée, du débutant à un niveau professionnel junior en Laravel !**