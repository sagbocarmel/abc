<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Enseignant;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnseignantPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Enseignant';
    /**
     * Determine whether the user can view any enseignants.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the enseignant.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return mixed
     */
    public function view(User $user, Enseignant $enseignant)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create enseignants.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the enseignant.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return mixed
     */
    public function update(User $user, Enseignant $enseignant)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the enseignant.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return mixed
     */
    public function delete(User $user, Enseignant $enseignant)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the enseignant.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return mixed
     */
    public function restore(User $user, Enseignant $enseignant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the enseignant.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Enseignant  $enseignant
     * @return mixed
     */
    public function forceDelete(User $user, Enseignant $enseignant)
    {
        return $user->canDelete($this->element);
    }
}
