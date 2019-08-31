<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mEnseignantClasse
 * 
 * @property string $codeEtablissement
 * @property string $matriculeEnseignant
 * @property string $codeClasse
 * @property string $classe
 * @property string $niveau
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEnseignant $48c5m_enseignant
 * @property \App\Models\48c5mClasse $48c5m_classe
 *
 * @package App\Models
 */
class EnseignantClasse extends Eloquent
{
	protected $table = '48c5m_EnseignantClasse';
	public $incrementing = false;

	protected $fillable = [
		'codeClasse'
	];

	public function enseignant()
	{
		return $this->belongsTo(\App\Models\Enseignant::class, 'matriculeEnseignant');
	}

	public function classe()
	{
		return $this->belongsTo(\App\Models\Classe::class, 'codeEtablissement')
					->where('48c5m_Classe.codeEtablissement', '=', '48c5m_EnseignantClasse.codeEtablissement')
					->where('48c5m_Classe.niveau', '=', '48c5m_EnseignantClasse.niveau')
					->where('48c5m_Classe.codeClasse', '=', '48c5m_EnseignantClasse.codeClasse');
	}
}
