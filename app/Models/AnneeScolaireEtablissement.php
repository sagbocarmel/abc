<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AnneeScolaireEtablissement
 * 
 * @property string $codeEtablissement
 * @property string $codeAnnee
 * @property \Carbon\Carbon $dateFermeture
 * @property int $statut
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 *
 * @package App\Models
 */
class AnneeScolaireEtablissement extends Eloquent
{
	protected $table = 'AnneeScolaireEtablissement';
	public $incrementing = false;

	protected $casts = [
		'statut' => 'int'
	];

	protected $dates = [
		'dateFermeture'
	];

	protected $fillable = [
		'dateFermeture',
		'statut'
	];

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
	}
}
