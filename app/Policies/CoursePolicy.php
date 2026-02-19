<?php

namespace App\Policies;

use App\Enums\CourseActivityStatusEnum;
use App\Enums\PermissionsEnum;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class CoursePolicy extends BasePolicy
{
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    public function view(User $user, Model $course): Response
    {
        return $course->status === CourseActivityStatusEnum::ACTIVE || $user->can(PermissionsEnum::VIEW_HIDDEN_CONTENT) ?
            Response::allow() :
            Response::denyAsNotFound();
    }
}
