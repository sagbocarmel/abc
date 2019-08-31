<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mEtablissement
 * 
 * @property string $numeroAutorisation
 * @property string $nom
 * @property boolean $logo
 * @property string $description
 * @property string $type
 * @property string $statut
 * @property string $adresse
 * @property string $bp
 * @property int $tel
 * @property string $email
 * @property \Carbon\Carbon $dateCreation
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__bulletins
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__classes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_annuelles
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_matieres
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_periodes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__niveaus
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__utilisateurs
 * @property \Illuminate\Database\Eloquent\Collection $annee_scolaire_etablissements
 *
 * @package App\Models
 */
class Etablissement extends Eloquent
{
	protected $table = '48c5m_Etablissement';
	protected $primaryKey = 'numeroAutorisation';
	public $incrementing = false;

	protected $casts = [
		'logo' => 'boolean',
		'tel' => 'int'
	];

	protected $dates = [
		'dateCreation'
	];

	protected $fillable = [
		'nom',
		'logo',
		'description',
		'type',
		'statut',
		'adresse',
		'bp',
		'tel',
		'email',
		'dateCreation'
	];

	public function bulletins()
	{
		return $this->hasMany(\App\Models\Bulletin::class, 'codeEtablissement');
	}

	public function classes()
	{
		return $this->hasMany(\App\Models\Classe::class, 'codeEtablissement');
	}

	public function moyenne_annuelles()
	{
		return $this->hasMany(\App\Models\MoyenneAnnuelle::class, 'codeEtablissement');
	}

	public function moyenne_matieres()
	{
		return $this->hasMany(\App\Models\MoyenneMatiere::class, 'codeEtablissement');
	}

	public function moyenne_periodes()
	{
		return $this->hasMany(\App\Models\MoyennePeriode::class, 'codeEtablissement');
	}

	public function niveaus()
	{
		return $this->hasMany(\App\Models\Niveau::class, 'codeEtablissement');
	}

	public function utilisateurs()
	{
		return $this->hasMany(\App\Models\Utilisateur::class, 'codeEtablissement');
	}

	public function annee_scolaire_etablissements()
	{
		return $this->hasMany(\App\Models\AnneeScolaireEtablissement::class, 'codeEtablissement');
	}
}
