<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mEleve
 * 
 * @property string $matriculeEleve
 * @property string $nom
 * @property string $prenoms
 * @property string $sexe
 * @property string $email
 * @property int $tel
 * @property int $tel2
 * @property \Carbon\Carbon $dateNaissance
 * @property string $lieuNaissance
 * @property string $nationalite
 * @property string $adresse
 * @property boolean $photo
 * @property string $infoSup
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__appreciations
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__bulletins
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__inscriptions
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_annuelles
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_matieres
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_periodes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__notes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__parent_eleves
 *
 * @package App\Models
 */
class Eleve extends Eloquent
{
	protected $table = '48c5m_Eleve';
	protected $primaryKey = 'matriculeEleve';
	public $incrementing = false;

	protected $casts = [
		'tel' => 'int',
		'tel2' => 'int',
		'photo' => 'boolean'
	];

	protected $dates = [
		'dateNaissance'
	];

	protected $fillable = [
		'nom',
		'prenoms',
		'sexe',
		'email',
		'tel',
		'tel2',
		'dateNaissance',
		'lieuNaissance',
		'nationalite',
		'adresse',
		'photo',
		'infoSup'
	];

	public function appreciations()
	{
		return $this->hasMany(\App\Models\Appreciation::class, 'matriculeEleve');
	}

	public function bulletins()
	{
		return $this->hasMany(\App\Models\Bulletin::class, 'matriculeEleve');
	}

	public function inscriptions()
	{
		return $this->hasMany(\App\Models\Inscription::class, 'matriculeEleve');
	}

	public function moyenne_annuelles()
	{
		return $this->hasMany(\App\Models\MoyenneAnnuelle::class, 'matriculeEleve');
	}

	public function moyenne_matieres()
	{
		return $this->hasMany(\App\Models\MoyenneMatiere::class, 'matriculeEleve');
	}

	public function moyenne_periodes()
	{
		return $this->hasMany(\App\Models\MoyennePeriode::class, 'matriculeEleve');
	}

	public function notes()
	{
		return $this->hasMany(\App\Models\Note::class, 'matriculeEleve');
	}

	public function parent_eleves()
	{
		return $this->hasMany(\App\Models\ParentEleve::class, 'matriculeEleve');
	}
}
