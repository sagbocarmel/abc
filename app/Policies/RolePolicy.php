<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Role';
    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Models\Utilisateur $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {

    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return $user->canDelete($this->element);
    }
}
