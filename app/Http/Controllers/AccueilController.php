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
            'total_livres' => 3,
            'total_utilisateurs' => 12,
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
            'totalLivres' => 5,
            'livresDisponibles' => 4,
            'totalEmprunts' => 12,
            'totalUtilisateurs' => 25
        ];

        // Livres mis en avant (top 3)
        $featuredBooks = [
            [
                'id' => 1,
                'titre' => 'Maîtriser Laravel',
                'auteur' => 'Expert PHP',
                'couverture' => '/images/livres/laravel.jpg'
            ],
            [
                'id' => 2,
                'titre' => 'Docker pour Débutants',
                'auteur' => 'DevOps Master',
                'couverture' => '/images/livres/docker.jpg'
            ],
            [
                'id' => 3,
                'titre' => 'PHP 8 Moderne',
                'auteur' => 'Développeur Pro',
                'couverture' => '/images/livres/php.jpg'
            ]
        ];

        return view('welcome', [
            'stats' => $stats,
            'featuredBooks' => $featuredBooks
        ]);
    }
}