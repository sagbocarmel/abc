<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 07:05:32 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mAnneeScolaire
 * 
 * @property string $codeAnnee
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__bulletins
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__cours
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__evaluations
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__inscriptions
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__matieres_de_classes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_annuelles
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_matieres
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_periodes
 * @property \Illuminate\Database\Eloquent\Collection $annee_scolaire_etablissements
 *
 * @package App\Models
 */
class AnneeScolaire extends Eloquent
{
	protected $table = '48c5m_AnneeScolaire';
	protected $primaryKey = 'codeAnnee';
	public $incrementing = false;

	public function bulletins()
	{
		return $this->hasMany(\App\Models\Bulletin::class, 'codeAnnee');
	}

	public function cours()
	{
		return $this->hasMany(\App\Models\Cour::class, 'codeAnnee');
	}

	public function evaluations()
	{
		return $this->hasMany(\App\Models\Evaluation::class, 'codeAnnee');
	}

	public function inscriptions()
	{
		return $this->hasMany(\App\Models\Inscription::class, 'codeAnnee');
	}

	public function matieres_de_classes()
	{
		return $this->hasMany(\App\Models\MatieresDeClass::class, 'codeAnnee');
	}

	public function moyenne_annuelles()
	{
		return $this->hasMany(\App\Models\MoyenneAnnuelle::class, 'codeAnnee');
	}

	public function moyenne_matieres()
	{
		return $this->hasMany(\App\Models\MoyenneMatiere::class, 'codeAnnee');
	}

	public function moyenne_periodes()
	{
		return $this->hasMany(\App\Models\MoyennePeriode::class, 'codeAnnee');
	}

	public function annee_scolaire_etablissements()
	{
		return $this->hasMany(\App\Models\AnneeScolaireEtablissement::class, 'codeAnnee');
	}
}
