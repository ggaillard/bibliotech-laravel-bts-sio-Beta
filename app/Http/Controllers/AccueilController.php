<?php

namespace App\Http\Controllers;



class AccueilController extends Controller
{
    /**
     * Affichage de la page d'accueil
     * SÉANCE 1 : Comprendre le passage de données à une vue
     */
    public function index()
    {
        $stats = [
            'totalLivres' => 5,
            'livresDisponibles' => 4,
            'totalEmprunts' => 12,
            'totalUtilisateurs' => 25
        ];

        // Livres mis en avant (top 3)
        $livresEnVedette = [
            [
                'id' => 1,
                'titre' => 'Maîtriser Laravel',
                'auteur' => 'Expert PHP',
                'couverture' => 'https://via.placeholder.com/300x400/FF6B35/white?text=Laravel'
            ],
            [
                'id' => 2,
                'titre' => 'Docker pour Débutants',
                'auteur' => 'DevOps Master',
                'couverture' => 'https://via.placeholder.com/300x400/0EA5E9/white?text=Docker'
            ],
            [
                'id' => 3,
                'titre' => 'PHP 8 Moderne',
                'auteur' => 'Développeur Pro',
                'couverture' => 'https://via.placeholder.com/300x400/8B5CF6/white?text=PHP+8'
            ]
        ];

        return view('welcome', [
            'stats' => $stats,
            'livresEnVedette' => $livresEnVedette
        ]);
    }
}