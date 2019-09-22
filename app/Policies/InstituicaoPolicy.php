<?php

namespace App\Policies;

use App\User;
use App\Instituicao;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstituicaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any instituicaos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the instituicao.
     *
     * @param  \App\User  $user
     * @param  \App\Instituicao  $instituicao
     * @return mixed
     */
    public function view(User $user, Instituicao $instituicao)
    {
        return true;
    }

    /**
     * Determine whether the user can create instituicaos.
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
     * Determine whether the user can update the instituicao.
     *
     * @param  \App\User  $user
     * @param  \App\Instituicao  $instituicao
     * @return mixed
     */
    public function update(User $user, Instituicao $instituicao)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the instituicao.
     *
     * @param  \App\User  $user
     * @param  \App\Instituicao  $instituicao
     * @return mixed
     */
    public function delete(User $user, Instituicao $instituicao)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the instituicao.
     *
     * @param  \App\User  $user
     * @param  \App\Instituicao  $instituicao
     * @return mixed
     */
    public function restore(User $user, Instituicao $instituicao)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the instituicao.
     *
     * @param  \App\User  $user
     * @param  \App\Instituicao  $instituicao
     * @return mixed
     */
    public function forceDelete(User $user, Instituicao $instituicao)
    {
        if($user->user_type_id == 1) {
            return true;
        } else {
            return false;
        }
    }
}
