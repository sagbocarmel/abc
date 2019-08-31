<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mEnseignant
 * 
 * @property string $matriculeEnseignant
 * @property string $nom
 * @property string $prenoms
 * @property string $sexe
 * @property string $email
 * @property int $tel
 * @property int $tel2
 * @property \Carbon\Carbon $dateNaissance
 * @property string $nationalite
 * @property string $adresse
 * @property boolean $photo
 * @property string $infoSup
 * @property string $diplome
 * @property string $contactUrgence
 * @property string $mode
 * @property boolean $cv
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__enseignant_classes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__matieres_de_classes
 *
 * @package App\Models
 */
class Enseignant extends Eloquent
{
	protected $table = '48c5m_Enseignant';
	protected $primaryKey = 'matriculeEnseignant';
	public $incrementing = false;

	protected $casts = [
		'tel' => 'int',
		'tel2' => 'int',
		'photo' => 'boolean',
		'cv' => 'boolean'
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
		'nationalite',
		'adresse',
		'photo',
		'infoSup',
		'diplome',
		'contactUrgence',
		'mode',
		'cv'
	];

	public function enseignant_classes()
	{
		return $this->hasMany(\App\Models\EnseignantClasse::class, 'matriculeEnseignant');
	}

	public function matieres_de_classes()
	{
		return $this->hasMany(\App\Models\MatieresDeClass::class, 'matriculeEnseignant');
	}
}
