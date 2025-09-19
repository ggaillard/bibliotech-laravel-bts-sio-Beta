
<?php
// Modèle Utilisateur Laravel
class Utilisateur extends Model {
	protected $table = 'utilisateurs';
	protected $fillable = ['nom', 'courriel', 'mot_de_passe'];
}
