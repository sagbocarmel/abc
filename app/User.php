<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $table = '48c5m_Utilisateur';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'codeEtablissement',  'nom', 'prenoms', 'sexe' ,'email','tel','tel2','password','photo'
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
        $permis = DB::table('48c5m_permissions_de_roles')
            ->join('48c5m_permissions', '48c5m_permissions_de_roles.idPermission', '=', '48c5m_permissions.id')
            ->join('48c5m_roles', '48c5m_permissions_de_roles.idRole', '=', '48c5m_roles.id')
            ->join('48c5m_profiles','48c5m_roles.id', '=', '48c5m_profiles.idRole')
            ->select('48c5m_permissions.titre')->where('48c5m_profiles.id',$this->idProfile)
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

    public function profile(){
        return $this->belongsTo('\App\Profile','idProfile');
    }

    public function findForPassport($username)
    {
        return $this->where('tel', $username)->first();
    }
}
