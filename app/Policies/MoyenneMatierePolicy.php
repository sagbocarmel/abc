<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\MoyenneMatiere;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoyenneMatierePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_MoyenneMatiere';
    /**
     * Determine whether the user can view any moyenne matieres.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the moyenne matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneMatiere  $moyenneMatiere
     * @return mixed
     */
    public function view(User $user, MoyenneMatiere $moyenneMatiere)
    {
        //
    }

    /**
     * Determine whether the user can create moyenne matieres.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the moyenne matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneMatiere  $moyenneMatiere
     * @return mixed
     */
    public function update(User $user, MoyenneMatiere $moyenneMatiere)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the moyenne matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneMatiere  $moyenneMatiere
     * @return mixed
     */
    public function delete(User $user, MoyenneMatiere $moyenneMatiere)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the moyenne matiere.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\MoyenneMatiere  $moyenneMatiere
     * @return mixed
     */
    public function restore(User $user, MoyenneMatiere $moyenneMatiere)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the moyenne matiere.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneMatiere  $moyenneMatiere
     * @return mixed
     */
    public function forceDelete(User $user, MoyenneMatiere $moyenneMatiere)
    {
        return $user->canDelete($this->element);
    }
}
