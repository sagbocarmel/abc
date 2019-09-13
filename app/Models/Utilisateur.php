<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
/**
 * Class 48c5mUtilisateur
 * 
 * @property string $codeEtablissement
 * @property string $nom
 * @property string $prenoms
 * @property string $sexe
 * @property string $email
 * @property int $tel
 * @property int $tel2
 * @property string $password
 * @property boolean $photo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\48c5mEtablissement $48c5m_etablissement
 * @property \Illuminate\Database\Eloquent\Collection $48c5m__profiles
 *
 * @package App\Models
 */
class Utilisateur extends  Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

	protected $table = '48c5m_Utilisateur';
    protected $primaryKey = 'tel';
    public $incrementing = false;

	protected $casts = [
		'tel' => 'int',
		'tel2' => 'int',
		'photo' => 'boolean'
	];

	protected $hidden = [
		'password', 'remember_token'
	];

	protected $fillable = [
        'codeEtablissement',
		'nom',
		'prenoms',
		'sexe',
		'email',
        'tel',
		'tel2',
		'password',
		'photo'
	];

    public function utilisateur_etablissements()
	{
		return $this->hasMany(\App\Models\UtilisateurEtablissement::class, 'tel');
	}

	public function canCreate($etablissement, $element){
	    $access = ['S', 'C', 'A','B'];
	    return $this->getAccessState($etablissement, $element, $access);
    }

	public function canUpdate($etablissement, $element){
        $access = ['S', 'U', 'A','E'];
        return $this->getAccessState($etablissement,$element, $access);
    }

    public function canRead($etablissement, $element){
        $access = ['S', 'R', 'A','B', 'E'];
        return $this->getAccessState($etablissement, $element, $access);
    }

    public function canDelete($etablissement, $element){
        $access = ['S', 'D'];
        return $this->getAccessState($etablissement,$element, $access);
    }

    public function getAccessState($etablissement,$element, $access)
    {
        foreach ($access as $acces)
        {
            if($this->hasElement($etablissement ,$element, $acces))
            {
                return true;
            }
        }
        return false;
    }

    public function hasAllElementAccess($eta, $elements, $access){
        $var = false;
        foreach ($elements as $element)
        {
            if($this->hasElement($eta, $element, $access)){
                $var = true;
            }
            else
            {
                $var = false;
                break;
            }
        }
        return $var;
    }

    public function hasElement($eta ,$element, $acces){
        $ue = UtilisateurEtablissement::where('codeEtablissement', $eta)->
        where('tel',$this->tel)->get();

        if($ue != null)
        {
            $profiles = Profile::where('codeEtablissement', $eta)->
            where('telUtilisateur',$this->tel)->get();
            foreach ($profiles as $profile) {
                // =  $profile->role();
                $userRole = Role::where('codeRole',$profile->codeRole)->first();
                $droits = Droit::where('codeRole',$userRole->codeRole)->where('codeElement',$element)->
                    get();
                foreach ($droits as $droit){
                    if(is_array($acces))
                    {
                        foreach ($acces as $acce)
                        {
                            if($droit->droit == $acce)
                            {
                                return true;
                            }
                        }
                    }
                    else{
                        if($droit->droit == $acces)
                        {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }

    public function hasAnyPermissions($role , $etablissement)
    {
        if(is_array($role))
        {
            foreach ($role as $permission)
            {
                if($this->hasRole($permission, $etablissement))
                {
                    return true;
                }
            }
        }
        else if ($this->hasRole($role, $etablissement))
        {
            return true;
        }
        return false;
    }

    public function hasRole($role, $etablissement){
        $ue = UtilisateurEtablissement::where('codeEtablissement', $etablissement)->
        where('tel',$this->tel)->first();
        if($ue != null)
        {
            $profiles = Profile::where('codeEtablissement', $etablissement)->
            where('telUtilisateur',$this->tel)->get();
            foreach ($profiles as $profile){
                 if($profile->codeRole == $role)
                 {
                     return true;
                 }
            }
        }
        return false;
    }
    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        // TODO: Implement hasVerifiedEmail() method.
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        // TODO: Implement markEmailAsVerified() method.
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        // TODO: Implement sendEmailVerificationNotification() method.
    }


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



    public function profile(){
        return $this->belongsTo('\App\Profile','idProfile');
    }

    public function AauthAcessToken(){
        return $this->hasMany('\App\Models\OauthAccessToken');
    }
}
