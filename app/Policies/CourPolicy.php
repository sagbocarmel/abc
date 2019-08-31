<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Cour;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Cours';
    /**
     * Determine whether the user can view any cours.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the cour.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Cour  $cour
     * @return mixed
     */
    public function view(User $user, Cour $cour)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create cours.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the cour.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Cour  $cour
     * @return mixed
     */
    public function update(User $user, Cour $cour)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the cour.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Cour  $cour
     * @return mixed
     */
    public function delete(User $user, Cour $cour)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the cour.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Cour  $cour
     * @return mixed
     */
    public function restore(User $user, Cour $cour)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the cour.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Cour  $cour
     * @return mixed
     */
    public function forceDelete(User $user, Cour $cour)
    {
        return $user->canDelete($this->element);
    }
}
