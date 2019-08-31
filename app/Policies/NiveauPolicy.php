<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Niveau;
use Illuminate\Auth\Access\HandlesAuthorization;

class NiveauPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Niveau';
    /**
     * Determine whether the user can view any niveaux.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the niveau.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Niveau  $niveau
     * @return mixed
     */
    public function view(User $user, Niveau $niveau)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create niveaux.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the niveau.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Niveau  $niveau
     * @return mixed
     */
    public function update(User $user, Niveau $niveau)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the niveau.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Niveau  $niveau
     * @return mixed
     */
    public function delete(User $user, Niveau $niveau)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the niveau.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Niveau  $niveau
     * @return mixed
     */
    public function restore(User $user, Niveau $niveau)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the niveau.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Niveau  $niveau
     * @return mixed
     */
    public function forceDelete(User $user, Niveau $niveau)
    {
        return $user->canDelete($this->element);
    }
}
