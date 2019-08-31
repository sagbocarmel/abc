<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Bulletin;
use Illuminate\Auth\Access\HandlesAuthorization;

class BulletinPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Bulletins';
    /**
     * Determine whether the user can view any bulletins.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the bulletin.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Bulletin  $bulletin
     * @return mixed
     */
    public function view(User $user, Bulletin $bulletin)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create bulletins.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the bulletin.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Bulletin  $bulletin
     * @return mixed
     */
    public function update(User $user, Bulletin $bulletin)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the bulletin.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Bulletin  $bulletin
     * @return mixed
     */
    public function delete(User $user, Bulletin $bulletin)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the bulletin.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Bulletin  $bulletin
     * @return mixed
     */
    public function restore(User $user, Bulletin $bulletin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the bulletin.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Bulletin  $bulletin
     * @return mixed
     */
    public function forceDelete(User $user, Bulletin $bulletin)
    {
        return $user->canDelete($this->element);
    }
}
