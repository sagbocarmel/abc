<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Parents;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentsPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Parents';
    /**
     * Determine whether the user can view any parents.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the parents.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Parents  $parents
     * @return mixed
     */
    public function view(User $user, Parents $parents)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create parents.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the parents.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Parents  $parents
     * @return mixed
     */
    public function update(User $user, Parents $parents)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the parents.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Parents  $parents
     * @return mixed
     */
    public function delete(User $user, Parents $parents)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the parents.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Parents  $parents
     * @return mixed
     */
    public function restore(User $user, Parents $parents)
    {

    }

    /**
     * Determine whether the user can permanently delete the parents.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Parents  $parents
     * @return mixed
     */
    public function forceDelete(User $user, Parents $parents)
    {
        return $user->canDelete($this->element);
    }
}
