
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\LivreController;

/*
|--------------------------------------------------------------------------
| SÉANCE 1 : Routes Fondamentales
|--------------------------------------------------------------------------
| Focus : Comprendre le routage Laravel basique
| - Routes simples
| - Paramètres d'URL
| - Routes nommées
| - Contrôleurs
*/

// 1. Accueil - Route simple
Route::get('/', [AccueilController::class, 'index'])->name('home');

// 2. À propos - Route vers vue directe  
Route::get('/about', function () {
    return view('about');
})->name('about');

// 3. Liste livres - Route vers contrôleur
Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');

// 4. Détail livre - Route avec paramètre
Route::get('/livre/{id}', [LivreController::class, 'show'])->name('livres.show');

// Recherche livre
Route::get('/recherche', [LivreController::class, 'search'])->name('livres.search');

// Route de démonstration pour comprendre les paramètres
Route::get('/demo/hello/{nom?}', function ($nom = 'Étudiant') {
    return view('demo.hello', ['nom' => $nom]);
})->name('demo.hello');
