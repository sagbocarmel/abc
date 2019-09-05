<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Sep 2019 02:14:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class 48c5mUtilisateurEtablissement
 * 
 * @property string $codeEtablissement
 * @property int $tel
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 * @property \App\Models\48c5mProfile $48c5m_profile
 *
 * @package App\Models
 */
class UtilisateurEtablissement extends Eloquent
{
	protected $table = '48c5m_UtilisateurEtablissement';
	public $incrementing = false;

	protected $casts = [
		'tel' => 'int'
	];

    public function utilisateur()
	{
		return $this->belongsTo(\App\Models\Utilisateur::class, 'tel');
	}

    public function etablissement()
    {
        return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
    }

    public function profile()
    {
        return $this->hasOne(\App\Models\Profile::class, 'codeEtablissement');
    }
}
