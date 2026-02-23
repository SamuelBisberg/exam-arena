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

    /**
     * Determine whether the user can view the course.
     *
     * @param  \App\Models\User  $user  the user attempting to view the course
     * @param  \App\Models\Course  $course  the course being viewed
     * @return \Illuminate\Auth\Access\Response indicates whether the user can view the course, allowing access if the course is active or if the user has permission to view hidden content, and denying access with a not found response otherwise
     */
    public function view(User $user, Model $course): Response
    {
        return $course->activity_status === CourseActivityStatusEnum::ACTIVE || $user->can(PermissionsEnum::VIEW_HIDDEN_CONTENT) ?
            Response::allow() :
            Response::denyAsNotFound();
    }
}
