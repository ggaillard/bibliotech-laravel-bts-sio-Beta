<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
	protected $table = 'livres';
	protected $fillable = [
		'titre',
		'auteur',
		'annee',
		'nb_pages',
		'isbn',
		'resume',
		'couverture',
		'disponible',
		'categorie'
	];
	// Ajoute ici des relations ou des méthodes si besoin
}
