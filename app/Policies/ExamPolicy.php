<?php

namespace App\Policies;

use App\Enums\VisibilityStatusEnum;
use BackedEnum;

class ExamPolicy extends ContentPolicy
{
    public static string $statusField = 'visibility_status';

    public static string|BackedEnum $statusActiveValue = VisibilityStatusEnum::PUBLISHED;
}
