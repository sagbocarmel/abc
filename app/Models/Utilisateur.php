<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Aug 2019 06:59:44 +0000.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

	public function etablissement()
	{
		return $this->belongsTo(\App\Models\Etablissement::class, 'codeEtablissement');
	}

	public function profiles()
	{
		return $this->hasMany(\App\Models\Profile::class, 'codeEtablissement');
	}

	public function canCreate($element){
	    $access = ['S', 'C', 'A','B'];
	    return $this->getAccessState($element, $access);
    }

	public function canUpdate($element){
        $access = ['S', 'U', 'A','E'];
        return $this->getAccessState($element, $access);
    }

    public function canRead($element){
        $access = ['S', 'R', 'A','B', 'E'];
        return $this->getAccessState($element, $access);
    }

    public function canDelete($element){
        $access = ['S', 'D'];
        return $this->getAccessState($element, $access);
    }

    public function hasElement($element, $acces){
        $profiles = $this->profiles();
        foreach ($profiles as $profile){
            $userRole =  $profile->role();
            $droits = $userRole->droits();
            foreach ($droits as $droit){
                if($droit->element()->codeElement == $element &&
                    $droit->droit == $acces)
                {
                    return true;
                }
            }
        }
        return false;
    }

    public function getAccessState($element, $access)
    {
        foreach ($access as $acces)
        {
            if($this->hasElement($element, $acces))
            {
                return true;
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
}
