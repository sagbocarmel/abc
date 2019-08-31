<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Eleve;
use Illuminate\Auth\Access\HandlesAuthorization;

class ElevePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Eleve';
    /**
     * Determine whether the user can view any eleves.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Eleve  $eleve
     * @return mixed
     */
    public function view(User $user, Eleve $eleve)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create eleves.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Eleve  $eleve
     * @return mixed
     */
    public function update(User $user, Eleve $eleve)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Eleve  $eleve
     * @return mixed
     */
    public function delete(User $user, Eleve $eleve)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Eleve  $eleve
     * @return mixed
     */
    public function restore(User $user, Eleve $eleve)
    {

    }

    /**
     * Determine whether the user can permanently delete the eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Eleve  $eleve
     * @return mixed
     */
    public function forceDelete(User $user, Eleve $eleve)
    {
        return $user->canDelete($this->element);
    }
}
