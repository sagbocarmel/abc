<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Element;
use Illuminate\Auth\Access\HandlesAuthorization;

class ElementPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Element';
    /**
     * Determine whether the user can view any elements.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
       return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the element.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Element  $element
     * @return mixed
     */
    public function view(User $user, Element $element)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create elements.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can update the element.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Element  $element
     * @return mixed
     */
    public function update(User $user, Element $element)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the element.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Element  $element
     * @return mixed
     */
    public function delete(User $user, Element $element)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the element.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Element  $element
     * @return mixed
     */
    public function restore(User $user, Element $element)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the element.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Element  $element
     * @return mixed
     */
    public function forceDelete(User $user, Element $element)
    {
        return $user->canDelete($this->element);
    }
}
