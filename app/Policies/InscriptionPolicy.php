<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Inscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscriptionPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Inscription';
    /**
     * Determine whether the user can view any inscriptions.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the inscription.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Inscription  $inscription
     * @return mixed
     */
    public function view(User $user, Inscription $inscription)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create inscriptions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the inscription.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Inscription  $inscription
     * @return mixed
     */
    public function update(User $user, Inscription $inscription)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the inscription.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Inscription  $inscription
     * @return mixed
     */
    public function delete(User $user, Inscription $inscription)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the inscription.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Inscription  $inscription
     * @return mixed
     */
    public function restore(User $user, Inscription $inscription)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the inscription.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Inscription  $inscription
     * @return mixed
     */
    public function forceDelete(User $user, Inscription $inscription)
    {
        return $user->canDelete($this->element);
    }
}
