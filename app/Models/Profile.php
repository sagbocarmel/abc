<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mProfile
 * 
 * @property string $codeEtablissement
 * @property int $telUtilisateur
 * @property string $codeRole
 * @property string $niveau
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mNiveau $48c5m_niveau
 * @property \App\Models\48c5mUtilisateur $48c5m_utilisateur
 * @property \App\Models\48c5mRole $48c5m_role
 *
 * @package App\Models
 */
class Profile extends Eloquent
{
	protected $table = '48c5m_Profile';
	public $incrementing = false;

	protected $casts = [
		'telUtilisateur' => 'int'
	];

	protected $fillable = [
		'codeRole',
		'niveau'
	];

	public function niveau()
	{
		return $this->belongsTo(\App\Models\Niveau::class, 'niveau');
	}

	public function utilisateur()
	{
		return $this->belongsTo(\App\Models\Utilisateur::class, 'codeEtablissement');
	}

	public function role()
	{
		return $this->hasOne(\App\Models\Role::class, 'codeRole');
	}
}
