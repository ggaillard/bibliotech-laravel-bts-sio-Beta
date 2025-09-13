<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Affichage de la page d'accueil
     * 
     * SÉANCE 1 : Comprendre le passage de données à une vue
     */
    public function index()
    {
        $stats = [
            'total_books' => 3,
            'total_users' => 12,
            'app_version' => '1.0.0',
            'laravel_version' => '11.x'
        ];
        
        return view('welcome', [
            'stats' => $stats,
            'message' => 'Bienvenue dans BiblioTech !'
        ]);
    }
}
<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Page d'accueil avec statistiques basiques
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Données statiques pour Séance 1
        // En Séance 2, ces données viendront de la BDD
        $stats = [
            'totalBooks' => 5,
            'availableBooks' => 4,
            'totalLoans' => 12,
            'totalUsers' => 25
        ];

        // Livres mis en avant (top 3)
        $featuredBooks = [
            [
                'id' => 1,
                'title' => 'Maîtriser Laravel',
                'author' => 'Expert PHP',
                'cover' => '/images/books/laravel.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Docker pour Débutants',
                'author' => 'DevOps Master',
                'cover' => '/images/books/docker.jpg'
            ],
            [
                'id' => 3,
                'title' => 'PHP 8 Moderne',
                'author' => 'Développeur Pro',
                'cover' => '/images/books/php.jpg'
            ]
        ];

        return view('welcome', [
            'stats' => $stats,
            'featuredBooks' => $featuredBooks
        ]);
    }
}