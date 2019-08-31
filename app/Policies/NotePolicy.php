<?php

namespace App\Policies;

use App\Models\Utilisateur as User;
use App\Models\Note;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;
    protected $element = '48c5m_Notes';
    /**
     * Determine whether the user can view any notes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can view the note.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Note  $note
     * @return mixed
     */
    public function view(User $user, Note $note)
    {
        return $user->canRead($this->element);
    }

    /**
     * Determine whether the user can create notes.
     *
     * @param  \App\Models\Utilisateur  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->canCreate($this->element);
    }

    /**
     * Determine whether the user can update the note.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Note  $note
     * @return mixed
     */
    public function update(User $user, Note $note)
    {
        return $user->canUpdate($this->element);
    }

    /**
     * Determine whether the user can delete the note.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Note  $note
     * @return mixed
     */
    public function delete(User $user, Note $note)
    {
        return $user->canDelete($this->element);
    }

    /**
     * Determine whether the user can restore the note.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Note  $note
     * @return mixed
     */
    public function restore(User $user, Note $note)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the note.
     *
     * @param  \App\Models\Utilisateur  $user
     * @param  \App\Models\Note  $note
     * @return mixed
     */
    public function forceDelete(User $user, Note $note)
    {
        return $user->canDelete($this->element);
    }
}
