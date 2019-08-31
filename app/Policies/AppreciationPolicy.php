<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Appreciation;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppreciationPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Appreciations';
    /**
     * Determine whether the user can view any appreciations.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the appreciation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Appreciation  $appreciation
     * @return mixed
     */
    public function view(User $user, Appreciation $appreciation)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create appreciations.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the appreciation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Appreciation  $appreciation
     * @return mixed
     */
    public function update(User $user, Appreciation $appreciation)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the appreciation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Appreciation  $appreciation
     * @return mixed
     */
    public function delete(User $user, Appreciation $appreciation)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the appreciation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Appreciation  $appreciation
     * @return mixed
     */
    public function restore(User $user, Appreciation $appreciation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the appreciation.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\Appreciation  $appreciation
     * @return mixed
     */
    public function forceDelete(User $user, Appreciation $appreciation)
    {
        return $user->canDelete($this->element);
    }
}
