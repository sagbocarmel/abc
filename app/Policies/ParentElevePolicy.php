<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\ParentEleve;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentElevePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_ParentEleves';
    /**
     * Determine whether the user can view any parent eleves.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the parent eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\ParentEleve  $parentEleve
     * @return mixed
     */
    public function view(User $user, ParentEleve $parentEleve)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create parent eleves.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the parent eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\ParentEleve  $parentEleve
     * @return mixed
     */
    public function update(User $user, ParentEleve $parentEleve)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the parent eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\ParentEleve  $parentEleve
     * @return mixed
     */
    public function delete(User $user, ParentEleve $parentEleve)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the parent eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\ParentEleve  $parentEleve
     * @return mixed
     */
    public function restore(User $user, ParentEleve $parentEleve)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the parent eleve.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\ParentEleve  $parentEleve
     * @return mixed
     */
    public function forceDelete(User $user, ParentEleve $parentEleve)
    {
        return $user->canDelete($this->element);
    }
}
