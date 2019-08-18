<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenoms', 'sexe' ,'email','tel1','tel2','password','idRole','telephone'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function permissions()
    {
        $permis = DB::table('permissions_de_roles')
            ->join('permissions', 'permissions_de_roles.idPermission', '=', 'permissions.id')
            ->join('roles', 'permissions_de_roles.idRole', '=', 'roles.id')
            ->select('permissions.titre')->where('roles.id',$this->idRole)
            ->get();
        return $permis;
    }

    public function hasAnyPermissions($permissions)
    {
        if(is_array($permissions))
        {
            foreach ($permissions as $permission)
            {
                if($this->hasPermission($permission))
                {
                    return true;
                }
            }
        }
        else if ($this->hasPermission($permissions))
        {
            return true;
        }
        return false;
    }

    public function hasPermission($permission)
    {
        $permis = $this->permissions();

        foreach ($permis as $permi)
        {
            if($permi->titre == $permission)
            {
                return true;
            }
        }
        return false;
    }

}
