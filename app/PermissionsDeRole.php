<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionsDeRole extends Model
{
    //
    /**
     * @var array
     */
    protected $primaryKey = ['idPermission','idRole'];
}
