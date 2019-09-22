<?php

namespace App\Policies;

use App\User;
use App\Curso;
use Illuminate\Auth\Access\HandlesAuthorization;

class CursoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any cursos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function view(User $user, Curso $curso)
    {
        return true;
    }

    /**
     * Determine whether the user can create cursos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function update(User $user, Curso $curso)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function delete(User $user, Curso $curso)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function restore(User $user, Curso $curso)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the curso.
     *
     * @param  \App\User  $user
     * @param  \App\Curso  $curso
     * @return mixed
     */
    public function forceDelete(User $user, Curso $curso)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }
}
