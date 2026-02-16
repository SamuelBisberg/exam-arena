<?php

namespace App\Policies;

use App\Enums\PermissionsEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class PermissionPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->can(PermissionsEnum::MANAGE_USERS) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Model $model): Response
    {
        return $user->can(PermissionsEnum::MANAGE_USERS) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Model $model): Response
    {
        return $user->can(PermissionsEnum::MANAGE_USERS) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Model $model): Response
    {
        return $user->can(PermissionsEnum::MANAGE_USERS) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Model $model): Response
    {
        return $user->can(PermissionsEnum::MANAGE_USERS) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Model $model): Response
    {
        return $user->can(PermissionsEnum::MANAGE_USERS) ?
            Response::allow() :
            Response::denyAsNotFound();
    }
}
