# 📚 Plan de traduction du projet BiblioTech en français

## Entités et tables
 - **users** → **utilisateurs**
 - **books** → **livres**
 - **loans** → **emprunts**
 - **reviews** → **avis**
 - **reservations** → **réservations**
 - **fines** → **amendes**

## Champs
 - name → nom
 - title → titre
 - author → auteur
 - email → courriel
 - phone → téléphone
 - created_at → cree_le
 - updated_at → modifie_le

## Modèles
 - Book → Livre
 - User → Utilisateur
 - Loan → Emprunt
 - Review → Avis
 - Category → Catégorie
 - Reservation → Réservation

## Contrôleurs
- BookController → LivreController
- UserController → UtilisateurController
- LoanController → EmpruntController
- ReviewController → AvisController
- CategoryController → CategorieController
- ReservationController → ReservationController
- FineController → AmendeController

## Script de renommage automatisé (bash)
```bash
# Modèles
mv app/Models/Book.php app/Models/Livre.php
mv app/Models/User.php app/Models/Utilisateur.php
mv app/Models/Loan.php app/Models/Emprunt.php
mv app/Models/Review.php app/Models/Avis.php
mv app/Models/Category.php app/Models/Categorie.php
mv app/Models/Reservation.php app/Models/Reservation.php
mv app/Models/Fine.php app/Models/Amende.php

# Contrôleurs
mv app/Http/Controllers/BookController.php app/Http/Controllers/LivreController.php
mv app/Http/Controllers/UserController.php app/Http/Controllers/UtilisateurController.php
mv app/Http/Controllers/LoanController.php app/Http/Controllers/EmpruntController.php
mv app/Http/Controllers/ReviewController.php app/Http/Controllers/AvisController.php
mv app/Http/Controllers/CategoryController.php app/Http/Controllers/CategorieController.php
mv app/Http/Controllers/ReservationController.php app/Http/Controllers/ReservationController.php
mv app/Http/Controllers/FineController.php app/Http/Controllers/AmendeController.php

# Migrations
mv database/migrations/xxxx_create_books_table.php database/migrations/xxxx_create_livres_table.php
mv database/migrations/xxxx_create_users_table.php database/migrations/xxxx_create_utilisateurs_table.php
# ... à adapter pour chaque migration

# Remplacement dans le code
find . -type f -name '*.php' -exec sed -i 's/Book/Livre/g' {} +
find . -type f -name '*.php' -exec sed -i 's/User/Utilisateur/g' {} +
find . -type f -name '*.php' -exec sed -i 's/Loan/Emprunt/g' {} +
find . -type f -name '*.php' -exec sed -i 's/Review/Avis/g' {} +
find . -type f -name '*.php' -exec sed -i 's/Category/Categorie/g' {} +
find . -type f -name '*.php' -exec sed -i 's/Reservation/Reservation/g' {} +
find . -type f -name '*.php' -exec sed -i 's/Fine/Amende/g' {} +
# ... à adapter pour les champs et autres entités
```

---

Ce plan permet de franciser l’ensemble du projet (base de données, modèles, contrôleurs, champs) de façon cohérente et automatisée.

## Exemple de migration traduite
```php
Schema::create('livres', function (Blueprint $table) {
    $table->id();
    $table->string('titre');
    $table->string('auteur');
    $table->unsignedBigInteger('categorie_id');
    $table->timestamps('cree_le', 'modifie_le');
});
```

## Exemple de modèle traduit
```php
class Livre extends Model {
    protected $table = 'livres';
    protected $fillable = ['titre', 'auteur', 'categorie_id'];
}
```

## Exemple de contrôleur traduit
```php
class LivreController extends Controller {
    // ... méthodes en français
}
```
