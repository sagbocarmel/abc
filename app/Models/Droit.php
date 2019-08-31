<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mDroit
 * 
 * @property string $codeRole
 * @property string $codeElement
 * @property string $droit
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mElement $48c5m_element
 * @property \App\Models\48c5mRole $48c5m_role
 *
 * @package App\Models
 */
class Droit extends Eloquent
{
    protected $table = '48c5m_Droits';
	public $incrementing = false;

	public function element()
	{
		return $this->belongsTo(\App\Models\Element::class, 'codeElement');
	}

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'codeRole');
	}
}
