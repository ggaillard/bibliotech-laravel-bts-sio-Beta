<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Modèle Utilisateur Laravel
class Utilisateur extends Model
{
	protected $table = 'utilisateurs';
	protected $fillable = [
		'nom',
		'courriel',
		'mot_de_passe'
	];
	// Ajoute ici des relations ou des méthodes si besoin
}
