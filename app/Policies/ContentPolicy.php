<?php

namespace App\Policies;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use App\Models\User;
use BackedEnum;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

/**
 * Generic content policy that can be used for any content type (e.g., courses, topics, cards).
 */
class ContentPolicy extends BasePolicy
{
    /**
     * The status value that indicates the content is visible to regular users. This should be set in the specific policy for each content type.
     */
    public static BackedEnum|string $statusActiveValue = 'active';

    /**
     * The name of the status field on the model that indicates the content's visibility status. This should be set in the specific policy for each content type.
     */
    public static string $statusField = 'status';

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user = null): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Model $model): Response
    {
        return $model->{self::$statusField} === self::$statusActiveValue || $user?->can(PermissionsEnum::VIEW_HIDDEN_CONTENT) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) || $user->can(PermissionsEnum::EDIT_CONTENT) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) || $user->can(PermissionsEnum::EDIT_CONTENT) ?
            Response::allow() :
            Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Model $model): Response
    {
        return $user->hasRole(RolesEnum::ADMIN) || $user->can(PermissionsEnum::EDIT_CONTENT) ?
            Response::allow() :
            Response::denyAsNotFound();
    }
}
