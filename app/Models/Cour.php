<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mCour
 * 
 * @property string $codeEtablissement
 * @property string $niveau
 * @property string $codeAnnee
 * @property string $codeClasse
 * @property string $codeMatiere
 * @property \Carbon\Carbon $dateCours
 * @property \Carbon\Carbon $heureDebut
 * @property \Carbon\Carbon $heureFin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 * @property \App\Models\48c5mClasse $48c5m_classe
 *
 * @package App\Models
 */
class Cour extends Eloquent
{
	public $incrementing = false;

	protected $dates = [
		'dateCours',
		'heureDebut',
		'heureFin'
	];

	protected $fillable = [
		'heureDebut',
		'heureFin'
	];

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}

	public function classe()
	{
		return $this->belongsTo(\App\Models\Classe::class, 'codeEtablissement')
					->where('48c5m_Classe.codeEtablissement', '=', '48c5m_Cours.codeEtablissement')
					->where('48c5m_Classe.niveau', '=', '48c5m_Cours.niveau')
					->where('48c5m_Classe.codeClasse', '=', '48c5m_Cours.codeClasse');
	}
}
