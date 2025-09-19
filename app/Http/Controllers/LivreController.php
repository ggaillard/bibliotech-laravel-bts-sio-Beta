<?php

namespace App\Http\Controllers;

class LivreController extends Controller
{
    /**
     * SÉANCE 1 : Affichage liste avec données statiques
     * 
     * Concepts enseignés :
     * - Données statiques dans contrôleur
     * - Passage de données à la vue
     * - Structure de données simple
     */
    public function index()
    {
        // Données STATIQUES pour comprendre MVC
            $livres = [
                [
                    'id' => 1, 
                    'titre' => 'Laravel pour Débutants', 
                    'auteur' => 'John Smith',
                    'year' => 2024,
                    'pages' => 320,
                    'description' => 'Guide complet pour apprendre Laravel étape par étape.'
                ],
                [
                    'id' => 2, 
                    'titre' => 'Docker en Pratique', 
                    'auteur' => 'Marie Dubois',
                    'year' => 2023,
                    'pages' => 280,
                    'description' => 'Maîtriser la containerisation avec Docker.'
                ],
                [
                    'id' => 3, 
                    'titre' => 'MVC Expliqué Simplement', 
                    'auteur' => 'Pierre Martin',
                    'year' => 2024,
                    'pages' => 195,
                    'description' => 'Comprendre l\'architecture MVC avec des exemples concrets.'
                ]
            ];
        
        return view('books.index', [
                'livres' => $livres,
            'total' => count($books)
        ]);
    }
    
    /**
     * SÉANCE 1 : Affichage détail avec paramètre d'URL
     * 
     * Concepts enseignés :
     * - Paramètres de route
     * - Recherche dans un tableau
     * - Gestion d'erreur simple
     */
    public function show($id)
    {
        // Simuler la recherche (sans BDD pour S1)
            $livres = [
                1 => [
                    'id' => 1, 
                    'titre' => 'Laravel pour Débutants', 
                    'auteur' => 'John Smith',
                    'year' => 2024,
                    'pages' => 320,
                    'isbn' => '978-2-1234-5678-9',
                    'description' => 'Guide complet pour apprendre Laravel étape par étape. Ce livre couvre tous les aspects fondamentaux du framework PHP le plus populaire.'
                ],
                2 => [
                    'id' => 2, 
                    'titre' => 'Docker en Pratique', 
                    'auteur' => 'Marie Dubois',
                    'year' => 2023,
                    'pages' => 280,
                    'isbn' => '978-2-1234-5679-6',
                    'description' => 'Maîtriser la containerisation avec Docker. Apprenez à créer, déployer et gérer des applications containerisées.'
                ],
                3 => [
                    'id' => 3, 
                    'titre' => 'MVC Expliqué Simplement', 
                    'auteur' => 'Pierre Martin',
                    'year' => 2024,
                    'pages' => 195,
                    'isbn' => '978-2-1234-5680-2',
                    'description' => 'Comprendre l\'architecture MVC avec des exemples concrets. Pattern architectural incontournable du développement moderne.'
                ]
            ];
        
        // Vérifier si le livre existe
        if (!isset($livres[$id])) {
            abort(404, 'Livre non trouvé');
        }
        
        return view('books.show', [
            'livre' => $livres[$id]
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Données statiques des livres pour Séance 1
     * En Séance 2, ces données viendront d'Eloquent : Book::all()
     */
    private function getLivresData()
    {
        return [
            [
                'id' => 1,
                'titre' => 'Maîtriser Laravel',
                'auteur' => 'Expert PHP',
                'isbn' => '978-2-123456-78-9',
                'categorie' => 'Développement Web',
                'description' => 'Guide complet pour apprendre Laravel de A à Z. Architecture MVC, Eloquent ORM, Blade templates et bien plus.',
                'couverture' => '/images/livres/laravel.jpg',
                'disponible' => true,
                'pages' => 450,
                'annee_publication' => 2024
            ],
            [
                'id' => 2,
                'titre' => 'Docker pour Débutants',
                'auteur' => 'DevOps Master',
                'isbn' => '978-2-987654-32-1',
                'categorie' => 'Infrastructure',
                'description' => 'Apprenez la containerisation avec Docker. Installation, configuration, Docker Compose et bonnes pratiques.',
                'couverture' => '/images/livres/docker.jpg',
                'disponible' => true,
                'pages' => 320,
                'annee_publication' => 2023
            ],
            [
                'id' => 3,
                'titre' => 'PHP 8 Moderne',
                'auteur' => 'Développeur Pro',
                'isbn' => '978-2-456789-12-3',
                'categorie' => 'Programmation',
                'description' => 'Découvrez PHP 8 et ses nouveautés : Union Types, Attributes, Match Expression et performances améliorées.',
                'couverture' => '/images/livres/php.jpg',
                'disponible' => false,
                'pages' => 380,
                'annee_publication' => 2023
            ],
            [
                'id' => 4,
                'titre' => 'Git et GitHub',
                'auteur' => 'Expert Git',
                'isbn' => '978-2-147258-36-9',
                'categorie' => 'Outils',
                'description' => 'Maîtrisez le contrôle de version avec Git. Branches, merge, rebase et collaboration avec GitHub.',
                'couverture' => '/images/livres/git.jpg',
                'disponible' => true,
                'pages' => 280,
                'annee_publication' => 2024
            ],
            [
                'id' => 5,
                'titre' => 'PostgreSQL Avancé',
                'auteur' => 'Expert Base de Données',
                'isbn' => '978-2-369147-25-8',
                'categorie' => 'Base de Données',
                'description' => 'PostgreSQL pour les développeurs : requêtes complexes, index, performances et administration.',
                'couverture' => '/images/livres/postgresql.jpg',
                'disponible' => true,
                'pages' => 520,
                'annee_publication' => 2023
            ]
        ];
    }

    /**
     * Afficher la liste des livres
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $livres = $this->getLivresData();

        // Statistiques simples
        $stats = [
            'total' => count($livres),
            'disponibles' => count(array_filter($livres, fn($livre) => $livre['disponible'])),
            'categories' => count(array_unique(array_column($livres, 'categorie')))
        ];

        return view('books.index', [
            'livres' => $livres,
            'stats' => $stats
        ]);
    }

    /**
     * Afficher le détail d'un livre
     * 
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $livres = $this->getLivresData();
        
        // Trouver le livre par ID
        $livre = collect($livres)->firstWhere('id', (int)$id);

        // Si livre non trouvé, retourner 404
        if (!$livre) {
            abort(404, 'Livre non trouvé');
        }

        // Livres similaires (même catégorie, sauf le livre courant)
        $livresAssocies = collect($livres)
            ->where('categorie', $livre['categorie'])
            ->where('id', '!=', $livre['id'])
            ->take(3)
            ->toArray();

        return view('books.show', [
            'livre' => $livre,
            'livresAssocies' => $livresAssocies
        ]);
    }

    /**
     * Rechercher des livres
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $livres = $this->getLivresData();
        
        $resultats = [];
        
        if ($query) {
            // Recherche simple dans titre et auteur
            $resultats = array_filter($livres, function($livre) use ($query) {
                return stripos($livre['titre'], $query) !== false || 
                       stripos($livre['auteur'], $query) !== false ||
                       stripos($livre['categorie'], $query) !== false;
            });
        }

        return view('books.search', [
            'query' => $query,
            'resultats' => $resultats,
            'totalResultats' => count($resultats)
        ]);
    }
}