<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Etablissement;
use Illuminate\Auth\Access\HandlesAuthorization;

class EtablissementPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Etablissement';
    /**
     * Determine whether the user can view any etablissements.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Etablissement  $etablissement
     * @return mixed
     */
    public function viewAny(User $user, Etablissement $etablissement)
    {
         return ($user != null && $etablissement !=null);
    }

    /**
     * Determine whether the user can view the etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Etablissement  $etablissement
     * @return mixed
     */
    public function view(User $user, Etablissement $etablissement)
    {
        if($user->hasRole('SuperAdmin') || $user->hasRole('SuperAdmin0'))
        {
            return true;
        }
        return ($user->canRead($etablissement,$this->element));
    }

    /**
     * Determine whether the user can create etablissements.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user, Etablissement $etablissement)
    {
        return $user->canCreate($etablissement,$this->element);
    }

    /**
     * Determine whether the user can update the etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Etablissement  $etablissement
     * @return mixed
     */
    public function update(User $user, Etablissement $etablissement)
    {
        //return $user->canUpdate($etablissement,$this->element);
        return true;
    }

    /**
     * Determine whether the user can delete the etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Etablissement  $etablissement
     * @return mixed
     */
    public function delete(User $user, Etablissement $etablissement)
    {
        return $user->canDelete($etablissement,$this->element);
    }

    /**
     * Determine whether the user can restore the etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Etablissement  $etablissement
     * @return mixed
     */
    public function restore(User $user, Etablissement $etablissement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Etablissement  $etablissement
     * @return mixed
     */
    public function forceDelete(User $user, Etablissement $etablissement)
    {
        return $user->canDelete($etablissement,$this->element);
    }
}
