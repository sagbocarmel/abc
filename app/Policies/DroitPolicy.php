<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Droit;
use Illuminate\Auth\Access\HandlesAuthorization;

class DroitPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Droits';
    /**
     * Determine whether the user can view any droits.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the droit.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\Droit  $droit
     * @return mixed
     */
    public function view(User $user, Droit $droit)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create droits.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the droit.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Droit  $droit
     * @return mixed
     */
    public function update(User $user, Droit $droit)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the droit.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Droit  $droit
     * @return mixed
     */
    public function delete(User $user, Droit $droit)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the droit.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Droit  $droit
     * @return mixed
     */
    public function restore(User $user, Droit $droit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the droit.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Droit  $droit
     * @return mixed
     */
    public function forceDelete(User $user, Droit $droit)
    {
        return $user->canDelete($this->element);
    }
}
