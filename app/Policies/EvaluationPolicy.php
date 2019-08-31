<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Evaluation;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvaluationPolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Evaluation';
    /**
     * Determine whether the user can view any evaluations.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the evaluation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function view(User $user, Evaluation $evaluation)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create evaluations.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the evaluation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function update(User $user, Evaluation $evaluation)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the evaluation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function delete(User $user, Evaluation $evaluation)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the evaluation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function restore(User $user, Evaluation $evaluation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the evaluation.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Evaluation  $evaluation
     * @return mixed
     */
    public function forceDelete(User $user, Evaluation $evaluation)
    {
        return $user->canDelete($this->element);
    }
}
