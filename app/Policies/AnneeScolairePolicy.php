<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\AnneeScolaire;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnneeScolairePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_AnneeScolaire';
    /**
     * Determine whether the user can view any annee scolaires.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the annee scolaire.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return mixed
     */
    public function view(User $user, AnneeScolaire $anneeScolaire)
    {
        $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create annee scolaires.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the annee scolaire.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return mixed
     */
    public function update(User $user, AnneeScolaire $anneeScolaire)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the annee scolaire.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return mixed
     */
    public function delete(User $user, AnneeScolaire $anneeScolaire)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the annee scolaire.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return mixed
     */
    public function restore(User $user, AnneeScolaire $anneeScolaire)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the annee scolaire.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaire  $anneeScolaire
     * @return mixed
     */
    public function forceDelete(User $user, AnneeScolaire $anneeScolaire)
    {
        return $user->canDelete($this->element);
    }
}
