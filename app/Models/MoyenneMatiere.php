<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mMoyenneMatiere
 * 
 * @property string $codeEtablissement
 * @property string $codeAnnee
 * @property string $codeMatiere
 * @property string $matriculeEleve
 * @property string $periode
 * @property float $moyenneComposition
 * @property float $moyenneDevoir
 * @property float $moyenneInterrogation
 * @property float $moyenneInterroDevoirs
 * @property float $moyenneMatiere
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEleve $48c5m_eleve
 * @property \App\Models\48c5mMatiere $48c5m_matiere
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 *
 * @package App\Models
 */
class MoyenneMatiere extends Eloquent
{
	protected $table = '48c5m_MoyenneMatiere';
	public $incrementing = false;

	protected $casts = [
		'moyenneComposition' => 'float',
		'moyenneDevoir' => 'float',
		'moyenneInterrogation' => 'float',
		'moyenneInterroDevoirs' => 'float',
		'moyenneMatiere' => 'float'
	];

	protected $fillable = [
		'periode',
		'moyenneComposition',
		'moyenneDevoir',
		'moyenneInterrogation',
		'moyenneInterroDevoirs',
		'moyenneMatiere'
	];

	public function eleve()
	{
		return $this->belongsTo(\App\Models\Eleve::class, 'matriculeEleve');
	}

	public function matiere()
	{
		return $this->belongsTo(\App\Models\Matiere::class, 'codeMatiere');
	}

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
	}
}
