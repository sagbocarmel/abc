<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Profile';
    /**
     * Determine whether the user can view any profiles.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param  \App\Models\Utilisateur $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Profile  $profile
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        return $user->canDelete($this->element);
    }
}
