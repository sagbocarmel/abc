<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mEvaluation
 * 
 * @property string $codeEtablissement
 * @property string $codeAnnee
 * @property string $niveau
 * @property string $codeClasse
 * @property string $codeMatiere
 * @property string $codeEvaluation
 * @property string $periode
 * @property string $type
 * @property \Carbon\Carbon $date
 * @property int $duree
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mAnneeScolaire $48c5m_annee_scolaire
 * @property \App\Models\48c5mClasse $48c5m_classe
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__appreciations
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__notes
 *
 * @package App\Models
 */
class Evaluation extends Eloquent
{
	protected $table = '48c5m_Evaluation';
	public $incrementing = false;

	protected $casts = [
		'duree' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'type',
		'date',
		'duree'
	];

	public function annee_scolaire()
	{
		return $this->belongsTo(\App\Models\AnneeScolaire::class, 'codeAnnee');
	}

	public function lasse()
	{
		return $this->belongsTo(\App\Models\Classe::class, 'codeEtablissement')
					->where('48c5m_Classe.codeEtablissement', '=', '48c5m_Evaluation.codeEtablissement')
					->where('48c5m_Classe.niveau', '=', '48c5m_Evaluation.niveau')
					->where('48c5m_Classe.codeClasse', '=', '48c5m_Evaluation.codeClasse');
	}

	public function appreciations()
	{
		return $this->hasMany(\App\Models\Appreciation::class, 'codeEtablissement');
	}

	public function notes()
	{
		return $this->hasMany(\App\Models\Note::class, 'codeEtablissement');
	}
}
