<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Séance 1 : MVC + Blade
|--------------------------------------------------------------------------
| Routes minimalistes pour comprendre le pattern MVC Laravel
| Progression : 4 routes simples avec paramètres et routes nommées
*/

// Route d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes des livres
Route::get('/livres', [BookController::class, 'index'])->name('books.index');
Route::get('/livres/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/recherche', [BookController::class, 'search'])->name('books.search');

// Pages statiques
Route::get('/a-propos', function () {
    return view('about');
})->name('about');

// Route de démonstration pour comprendre les paramètres
Route::get('/demo/hello/{nom?}', function ($nom = 'Étudiant') {
    return view('demo.hello', ['nom' => $nom]);
})->name('demo.hello');