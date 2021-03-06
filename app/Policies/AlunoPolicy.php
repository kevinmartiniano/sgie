<?php

namespace App\Policies;

use App\User;
use App\Aluno;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlunoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any alunos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function view(User $user, Aluno $aluno)
    {
        return true;
    }

    /**
     * Determine whether the user can create alunos.
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
     * Determine whether the user can update the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function update(User $user, Aluno $aluno)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function delete(User $user, Aluno $aluno)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function restore(User $user, Aluno $aluno)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function forceDelete(User $user, Aluno $aluno)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }
}
