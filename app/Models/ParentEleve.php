<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mParentElefe
 * 
 * @property int $telParent
 * @property string $matriculeEleve
 * @property string $titre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEleve $48c5m_eleve
 * @property \App\Models\48c5mParent $48c5m_parent
 *
 * @package App\Models
 */
class ParentEleve extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'telParent' => 'int'
	];

	protected $fillable = [
		'titre'
	];

	public function eleve()
	{
		return $this->belongsTo(\App\Models\Eleve::class, 'matriculeEleve');
	}

	public function parent()
	{
		return $this->belongsTo(\App\Models\Parents::class, 'telParent');
	}
}
