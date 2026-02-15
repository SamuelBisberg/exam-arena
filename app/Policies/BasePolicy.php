<?php

namespace App\Policies;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class BasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) ?
            Response::allow() :
            Response::denyAsNotFound();
    }
}
