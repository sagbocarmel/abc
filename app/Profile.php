<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table = '48c5m_profiles';

    protected $fillable = [
        'idRole','idEtablissement'
    ];

    public function role(){
        $this->hasOne('\App\Roles','idRole');
    }
}
