<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mElement
 * 
 * @property string $codeElement
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__droits
 *
 * @package App\Models
 */
class Element extends Eloquent
{
	protected $table = '48c5m_Element';
	protected $primaryKey = 'codeElement';
	public $incrementing = false;

	protected $fillable = [
		'description'
	];

	public function droits()
	{
		return $this->hasMany(\App\Models\Droit::class, 'codeElement');
	}
}
