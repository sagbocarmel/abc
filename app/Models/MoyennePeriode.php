<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mMoyennePeriode
 * 
 * @property string $codeEtablissement
 * @property string $codeAnnee
 * @property string $matriculeEleve
 * @property string $periode
 * @property float $moyenne
 * @property string $mention
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEleve $48c5m_eleve
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 *
 * @package App\Models
 */
class MoyennePeriode extends Eloquent
{
	protected $table = '48c5m_MoyennePeriode';
	public $incrementing = false;

	protected $casts = [
		'moyenne' => 'float'
	];

	protected $fillable = [
		'moyenne',
		'mention'
	];

	public function eleve()
	{
		return $this->belongsTo(\App\Models\Eleve::class, 'matriculeEleve');
	}

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
	}

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}
}
