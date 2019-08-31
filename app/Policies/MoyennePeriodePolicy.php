<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\MoyennePeriode;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoyennePeriodePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_MoyennePeriode';
    /**
     * Determine whether the user can view any moyenne periodes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the moyenne periode.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyennePeriode  $moyennePeriode
     * @return mixed
     */
    public function view(User $user, MoyennePeriode $moyennePeriode)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create moyenne periodes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the moyenne periode.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyennePeriode  $moyennePeriode
     * @return mixed
     */
    public function update(User $user, MoyennePeriode $moyennePeriode)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the moyenne periode.
     *
     * @param  \App\User  $user
     * @param  \App\Models\MoyennePeriode  $moyennePeriode
     * @return mixed
     */
    public function delete(User $user, MoyennePeriode $moyennePeriode)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the moyenne periode.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyennePeriode  $moyennePeriode
     * @return mixed
     */
    public function restore(User $user, MoyennePeriode $moyennePeriode)
    {

    }

    /**
     * Determine whether the user can permanently delete the moyenne periode.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyennePeriode  $moyennePeriode
     * @return mixed
     */
    public function forceDelete(User $user, MoyennePeriode $moyennePeriode)
    {
        return $user->canDelete($this->element);
    }
}
