<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Classe;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Classe';
    /**
     * Determine whether the user can view any classes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Classe  $classe
     * @return mixed
     */
    public function view(User $user, Classe $classe)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create classes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Classe  $classe
     * @return mixed
     */
    public function update(User $user, Classe $classe)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Classe  $classe
     * @return mixed
     */
    public function delete(User $user, Classe $classe)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Classe  $classe
     * @return mixed
     */
    public function restore(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the classe.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Classe  $classe
     * @return mixed
     */
    public function forceDelete(User $user, Classe $classe)
    {
        return $user->canDelete($this->element);
    }
}
