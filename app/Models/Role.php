<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mRole
 * 
 * @property string $codeRole
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__droits
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__profiles
 *
 * @package App\Models
 */
class Role extends Eloquent
{
	protected $table = '48c5m_Role';
	protected $primaryKey = 'codeRole';
	public $incrementing = false;

	protected $fillable = [
		'description'
	];

	public function droits()
	{
		return $this->belongsToMany(\App\Models\Droit::class, 'codeRole');
	}

	public function profiles()
	{
		return $this->hasMany(\App\Models\Profile::class, 'codeRole');
	}
}
