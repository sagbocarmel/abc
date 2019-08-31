<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mMatieresDeClass
 * 
 * @property string $codeEtablissement
 * @property string $codeAnnee
 * @property string $niveau
 * @property string $codeClasse
 * @property string $codeMatiere
 * @property string $matriculeEnseignant
 * @property int $coefficient
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEnseignant $48c5m_enseignant
 * @property \App\Models\48c5mMatiere $48c5m_matiere
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 * @property \App\Models\48c5mClasse $48c5m_classe
 *
 * @package App\Models
 */
class MatieresDeClass extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'coefficient' => 'int'
	];

	protected $fillable = [
		'matriculeEnseignant',
		'coefficient'
	];

	public function enseignant()
	{
		return $this->belongsTo(\App\Models\Enseignant::class, 'matriculeEnseignant');
	}

	public function matiere()
	{
		return $this->belongsTo(\App\Models\Matiere::class, 'codeMatiere');
	}

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}

	public function classe()
	{
		return $this->belongsTo(\App\Models\Classe::class, 'codeEtablissement')
					->where('48c5m_Classe.codeEtablissement', '=', '48c5m_MatieresDeClasses.codeEtablissement')
					->where('48c5m_Classe.niveau', '=', '48c5m_MatieresDeClasses.niveau')
					->where('48c5m_Classe.codeClasse', '=', '48c5m_MatieresDeClasses.codeClasse');
	}
}
