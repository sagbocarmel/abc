<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mParent
 * 
 * @property string $nom
 * @property string $prenoms
 * @property string $sexe
 * @property string $email
 * @property int $tel
 * @property int $tel2
 * @property string $langueLocale
 * @property string $profession
 * @property string $password
 * @property boolean $photo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__parent_eleves
 *
 * @package App\Models
 */
class Parents extends Eloquent
{
	protected $primaryKey = 'tel';
	public $incrementing = false;

	protected $casts = [
		'tel' => 'int',
		'tel2' => 'int',
		'photo' => 'boolean'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nom',
		'prenoms',
		'sexe',
		'email',
		'tel2',
		'langueLocale',
		'profession',
		'password',
		'photo'
	];

	public function parent_eleves()
	{
		return $this->hasMany(\App\Models\ParentEleve::class, 'telParent');
	}
}
