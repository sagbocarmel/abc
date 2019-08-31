<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mInscription
 * 
 * @property string $codeEtablissement
 * @property string $niveau
 * @property string $codeClasse
 * @property string $codeAnnee
 * @property string $matriculeEleve
 * @property \Carbon\Carbon $dateInscription
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEleve $48c5m_eleve
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 * @property \App\Models\48c5mClasse $48c5m_classe
 *
 * @package App\Models
 */
class Inscription extends Eloquent
{
	protected $table = '48c5m_Inscription';
	public $incrementing = false;

	protected $dates = [
		'dateInscription'
	];

	protected $fillable = [
		'dateInscription'
	];

	public function eleve()
	{
		return $this->belongsTo(\App\Models\Eleve::class, 'matriculeEleve');
	}

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}

	public function classe()
	{
		return $this->belongsTo(\App\Models\Classe::class, 'codeEtablissement')
					->where('48c5m_Classe.codeEtablissement', '=', '48c5m_Inscription.codeEtablissement')
					->where('48c5m_Classe.niveau', '=', '48c5m_Inscription.niveau')
					->where('48c5m_Classe.codeClasse', '=', '48c5m_Inscription.codeClasse');
	}
}
