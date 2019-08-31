<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mNiveau
 * 
 * @property string $niveau
 * @property string $codeEtablissement
 * @property int $periodesAnnee
 * @property int $methodeCalculMoyennes
 * @property \Carbon\Carbon $heureDebutCours
 * @property \Carbon\Carbon $heureFinCours
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__classes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__profiles
 *
 * @package App\Models
 */
class Niveau extends Eloquent
{
	protected $table = '48c5m_Niveau';
	public $incrementing = false;

	protected $casts = [
		'periodesAnnee' => 'int',
		'methodeCalculMoyennes' => 'int'
	];

	protected $dates = [
		'heureDebutCours',
		'heureFinCours'
	];

	protected $fillable = [
		'periodesAnnee',
		'methodeCalculMoyennes',
		'heureDebutCours',
		'heureFinCours'
	];

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
	}

	public function classes()
	{
		return $this->hasMany(\App\Models\Classe::class, 'niveau');
	}

	public function profiles()
	{
		return $this->hasMany(\App\Models\Profile::class, 'niveau');
	}
}
