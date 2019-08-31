<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\AnneeScolaireEtablissement;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnneeScolaireEtablissementPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_AnneeScolaireEtablissement';
    /**
     * Determine whether the user can view any annee scolaire etablissements.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the annee scolaire etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaireEtablissement  $anneeScolaireEtablissement
     * @return mixed
     */
    public function view(User $user, AnneeScolaireEtablissement $anneeScolaireEtablissement)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create annee scolaire etablissements.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the annee scolaire etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaireEtablissement  $anneeScolaireEtablissement
     * @return mixed
     */
    public function update(User $user, AnneeScolaireEtablissement $anneeScolaireEtablissement)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the annee scolaire etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaireEtablissement  $anneeScolaireEtablissement
     * @return mixed
     */
    public function delete(User $user, AnneeScolaireEtablissement $anneeScolaireEtablissement)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the annee scolaire etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaireEtablissement  $anneeScolaireEtablissement
     * @return mixed
     */
    public function restore(User $user, AnneeScolaireEtablissement $anneeScolaireEtablissement)
    {

    }

    /**
     * Determine whether the user can permanently delete the annee scolaire etablissement.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\AnneeScolaireEtablissement  $anneeScolaireEtablissement
     * @return mixed
     */
    public function forceDelete(User $user, AnneeScolaireEtablissement $anneeScolaireEtablissement)
    {
        return $user->canDelete($this->element);
    }
}
