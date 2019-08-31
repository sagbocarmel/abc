<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mNote
 * 
 * @property string $codeEtablissement
 * @property string $codeAnnee
 * @property string $codeMatiere
 * @property string $codeEvaluation
 * @property string $niveau
 * @property string $codeClasse
 * @property string $periode
 * @property string $matriculeEleve
 * @property float $note
 * @property \Carbon\Carbon $dateNote
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEleve $48c5m_eleve
 * @property \App\Models\48c5mEvaluation $48c5m_evaluation
 *
 * @package App\Models
 */
class Note extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'note' => 'float'
	];

	protected $dates = [
		'dateNote'
	];

	protected $fillable = [
		'niveau',
		'codeClasse',
		'note',
		'dateNote'
	];

	public function eleve()
	{
		return $this->belongsTo(\App\Models\Eleve::class, 'matriculeEleve');
	}

	public function evaluation()
	{
		return $this->belongsTo(\App\Models\Evaluation::class, 'codeEtablissement')
					->where('48c5m_Evaluation.codeEtablissement', '=', '48c5m_Notes.codeEtablissement')
					->where('48c5m_Evaluation.niveau', '=', '48c5m_Notes.niveau')
					->where('48c5m_Evaluation.codeAnnee', '=', '48c5m_Notes.codeAnnee')
					->where('48c5m_Evaluation.codeClasse', '=', '48c5m_Notes.codeClasse')
					->where('48c5m_Evaluation.codeMatiere', '=', '48c5m_Notes.codeMatiere')
					->where('48c5m_Evaluation.codeEvaluation', '=', '48c5m_Notes.codeEvaluation')
					->where('48c5m_Evaluation.periode', '=', '48c5m_Notes.periode');
	}
}
