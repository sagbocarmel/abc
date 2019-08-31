<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\EnseignantClasse;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnseignantClassePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_EnseignantClasse';
    /**
     * Determine whether the user can view any enseignant classes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the enseignant classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\EnseignantClasse  $enseignantClasse
     * @return mixed
     */
    public function view(User $user, EnseignantClasse $enseignantClasse)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create enseignant classes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the enseignant classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\EnseignantClasse  $enseignantClasse
     * @return mixed
     */
    public function update(User $user, EnseignantClasse $enseignantClasse)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the enseignant classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\EnseignantClasse  $enseignantClasse
     * @return mixed
     */
    public function delete(User $user, EnseignantClasse $enseignantClasse)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the enseignant classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\EnseignantClasse  $enseignantClasse
     * @return mixed
     */
    public function restore(User $user, EnseignantClasse $enseignantClasse)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the enseignant classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\EnseignantClasse  $enseignantClasse
     * @return mixed
     */
    public function forceDelete(User $user, EnseignantClasse $enseignantClasse)
    {
        return $user->canDelete($this->element);
    }
}
