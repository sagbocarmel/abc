<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Matiere;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatierePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Matiere';
    /**
     * Determine whether the user can view any matieres.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Matiere  $matiere
     * @return mixed
     */
    public function view(User $user, Matiere $matiere)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create matieres.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Matiere  $matiere
     * @return mixed
     */
    public function update(User $user, Matiere $matiere)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Matiere  $matiere
     * @return mixed
     */
    public function delete(User $user, Matiere $matiere)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Matiere  $matiere
     * @return mixed
     */
    public function restore(User $user, Matiere $matiere)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Matiere  $matiere
     * @return mixed
     */
    public function forceDelete(User $user, Matiere $matiere)
    {
        return $user->canDelete($this->element);
    }
}
