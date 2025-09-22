<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Affichage liste avec données statiques
     * SÉANCE 1 : Comprendre les collections de données et leur passage aux vues
     */
    public function index()
    {
        $livres = [
            [
                'id' => 1,
                'titre' => 'Laravel pour Débutants',
                'auteur' => 'John Smith',
                'year' => 2024,
                'pages' => 320,
                'description' => 'Guide complet pour apprendre Laravel étape par étape.',
                'couverture' => 'https://via.placeholder.com/300x400/FF6B35/white?text=Laravel+Débutants'
            ],
            [
                'id' => 2,
                'titre' => 'Docker en Pratique',
                'auteur' => 'Marie Dubois',
                'year' => 2023,
                'pages' => 280,
                'description' => 'Maîtriser la containerisation avec Docker.',
                'couverture' => 'https://via.placeholder.com/300x400/0EA5E9/white?text=Docker+Pratique'
            ],
            [
                'id' => 3,
                'titre' => 'MVC Expliqué Simplement',
                'auteur' => 'Pierre Martin',
                'year' => 2024,
                'pages' => 195,
                'description' => 'Comprendre l\'architecture MVC avec des exemples concrets.',
                'couverture' => 'https://via.placeholder.com/300x400/8B5CF6/white?text=MVC+Simple'
            ]
        ];

        return view('books.index', [
            'livres' => $livres,
            'total' => count($livres)
        ]);
    }

    /**
     * Affichage détail avec paramètre d'URL
     * SÉANCE 1 : Comprendre les paramètres de route et la gestion d'erreurs
     */
    public function show($id)
    {
        // Conversion de l'ID en entier pour éviter les erreurs
        $id = (int) $id;

        $livres = [
            1 => [
                'id' => 1,
                'titre' => 'Laravel pour Débutants',
                'auteur' => 'John Smith',
                'year' => 2024,
                'pages' => 320,
                'isbn' => '978-2-1234-5678-9',
                'description' => 'Guide complet pour apprendre Laravel étape par étape. Ce livre couvre tous les aspects fondamentaux du framework PHP le plus populaire.',
                'couverture' => 'https://via.placeholder.com/400x600/FF6B35/white?text=Laravel+Débutants',
                'disponible' => true,
                'categorie' => 'Framework PHP'
            ],
            2 => [
                'id' => 2,
                'titre' => 'Docker en Pratique',
                'auteur' => 'Marie Dubois',
                'year' => 2023,
                'pages' => 280,
                'isbn' => '978-2-1234-5679-6',
                'description' => 'Maîtriser la containerisation avec Docker. Apprenez à créer, déployer et gérer des applications containerisées.',
                'couverture' => 'https://via.placeholder.com/400x600/0EA5E9/white?text=Docker+Pratique',
                'disponible' => true,
                'categorie' => 'DevOps'
            ],
            3 => [
                'id' => 3,
                'titre' => 'MVC Expliqué Simplement',
                'auteur' => 'Pierre Martin',
                'year' => 2024,
                'pages' => 195,
                'isbn' => '978-2-1234-5680-2',
                'description' => 'Comprendre l\'architecture MVC avec des exemples concrets. Pattern architectural incontournable du développement moderne.',
                'couverture' => 'https://via.placeholder.com/400x600/8B5CF6/white?text=MVC+Simple',
                'disponible' => false,
                'categorie' => 'Architecture'
            ]
        ];

        // Vérification de l'existence du livre
        if (!isset($livres[$id])) {
            abort(404, 'Livre non trouvé');
        }

        return view('livres.show', [
            'livre' => $livres[$id]
        ]);
    }

    /**
     * Recherche de livres
     * SÉANCE 1 : Comprendre la récupération de données de formulaire
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');

        $tousLesLivres = [
            [
                'id' => 1,
                'titre' => 'Laravel pour Débutants',
                'auteur' => 'John Smith',
                'year' => 2024,
                'pages' => 320,
                'description' => 'Guide complet pour apprendre Laravel étape par étape.',
                'couverture' => 'https://via.placeholder.com/300x400/FF6B35/white?text=Laravel+Débutants'
            ],
            [
                'id' => 2,
                'titre' => 'Docker en Pratique',
                'auteur' => 'Marie Dubois',
                'year' => 2023,
                'pages' => 280,
                'description' => 'Maîtriser la containerisation avec Docker.',
                'couverture' => 'https://via.placeholder.com/300x400/0EA5E9/white?text=Docker+Pratique'
            ],
            [
                'id' => 3,
                'titre' => 'MVC Expliqué Simplement',
                'auteur' => 'Pierre Martin',
                'year' => 2024,
                'pages' => 195,
                'description' => 'Comprendre l\'architecture MVC avec des exemples concrets.',
                'couverture' => 'https://via.placeholder.com/300x400/8B5CF6/white?text=MVC+Simple'
            ]
        ];

        // Filtrage des livres selon la requête de recherche
        $livresFiltres = [];
        if (!empty($query)) {
            foreach ($tousLesLivres as $livre) {
                if (
                    stripos($livre['titre'], $query) !== false ||
                    stripos($livre['auteur'], $query) !== false ||
                    stripos($livre['description'], $query) !== false
                ) {
                    $livresFiltres[] = $livre;
                }
            }
        } else {
            $livresFiltres = $tousLesLivres;
        }

        return view('books.search', [
            'livres' => $livresFiltres,
            'query' => $query,
            'total' => count($livresFiltres)
        ]);
    }
}

