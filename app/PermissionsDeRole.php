<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionsDeRole extends Model
{
    //
    /**
     * @var array
     */
    protected $table = '48c5m_permissions_de_roles';

    protected $fillable = [
        'idPermission', 'idRole'
    ];
}
