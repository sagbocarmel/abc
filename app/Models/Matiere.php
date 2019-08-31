<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 10:37:32 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mMatiere
 * 
 * @property string $codeMatiere
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__matieres_de_classes
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__moyenne_matieres
 *
 * @package App\Models
 */
class Matiere extends Eloquent
{
	protected $table = '48c5m_Matiere';
	protected $primaryKey = 'codeMatiere';
	public $incrementing = false;

	protected $fillable = [
		'type'
	];

	public function matieres_de_classes()
	{
		return $this->hasMany(\App\Models\MatieresDeClass::class, 'codeMatiere');
	}

	public function moyenne_matieres()
	{
		return $this->hasMany(\App\Models\MoyenneMatiere::class, 'codeMatiere');
	}
}
