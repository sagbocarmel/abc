<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mClasse
 * 
 * @property string $codeEtablissement
 * @property string $niveau
 * @property string $codeClasse
 * @property string $anneEtude
 * @property string $serie
 * @property string $codeSection
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 * @property \App\Models\48c5mNiveau $48c5m_niveau
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__cours
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__enseignant_classes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__evaluations
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__inscriptions
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__matieres_de_classes
 *
 * @package App\Models
 */
class Classe extends Eloquent
{
	protected $table = '48c5m_Classe';
	public $incrementing = false;

	protected $fillable = [
		'anneEtude',
		'serie',
		'codeSection'
	];

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
	}

	public function niveau()
	{
		return $this->belongsTo(\App\Models\Niveau::class, 'niveau');
	}

	public function cours()
	{
		return $this->hasMany(\App\Models\Cour::class, 'codeEtablissement');
	}

	public function enseignant_classes()
	{
		return $this->hasMany(\App\Models\EnseignantClasse::class, 'codeEtablissement');
	}

	public function evaluations()
	{
		return $this->hasMany(\App\Models\Evaluation::class, 'codeEtablissement');
	}

	public function inscriptions()
	{
		return $this->hasMany(\App\Models\Inscription::class, 'codeEtablissement');
	}

	public function matieres_de_classes()
	{
		return $this->hasMany(\App\Models\MatieresDeClass::class, 'codeEtablissement');
	}
}
