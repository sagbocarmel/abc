<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = '48c5m_permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre','description'
    ];

    public function roles(){
        $this->belongsToMany('App\Roles', '48c5m_permissions_de_roles');
    }
}
