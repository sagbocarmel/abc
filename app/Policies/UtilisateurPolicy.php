<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Utilisateur;
use Illuminate\Auth\Access\HandlesAuthorization;

class UtilisateurPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Utilisateur';
    /**
     * Determine whether the user can view any utilisateurs.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the utilisateur.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return mixed
     */
    public function view(User $user, Utilisateur $utilisateur)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create utilisateurs.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the utilisateur.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return mixed
     */
    public function update(User $user, Utilisateur $utilisateur)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the utilisateur.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return mixed
     */
    public function delete(User $user, Utilisateur $utilisateur)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the utilisateur.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return mixed
     */
    public function restore(User $user, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the utilisateur.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return mixed
     */
    public function forceDelete(User $user, Utilisateur $utilisateur)
    {
        return $user->canDelete($this->element);
    }
}
