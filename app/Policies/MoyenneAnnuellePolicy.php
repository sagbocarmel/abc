<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\MoyenneAnnuelle;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoyenneAnnuellePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_MoyenneAnnuelle';
    /**
     * Determine whether the user can view any moyenne annuelles.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the moyenne annuelle.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneAnnuelle  $moyenneAnnuelle
     * @return mixed
     */
    public function view(User $user, MoyenneAnnuelle $moyenneAnnuelle)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create moyenne annuelles.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the moyenne annuelle.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneAnnuelle  $moyenneAnnuelle
     * @return mixed
     */
    public function update(User $user, MoyenneAnnuelle $moyenneAnnuelle)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the moyenne annuelle.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneAnnuelle  $moyenneAnnuelle
     * @return mixed
     */
    public function delete(User $user, MoyenneAnnuelle $moyenneAnnuelle)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the moyenne annuelle.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneAnnuelle  $moyenneAnnuelle
     * @return mixed
     */
    public function restore(User $user, MoyenneAnnuelle $moyenneAnnuelle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the moyenne annuelle.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\MoyenneAnnuelle  $moyenneAnnuelle
     * @return mixed
     */
    public function forceDelete(User $user, MoyenneAnnuelle $moyenneAnnuelle)
    {
        return $user->canDelete($this->element);
    }
}
