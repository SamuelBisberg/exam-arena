<?php

namespace App\Enums;

enum CourseActivityStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DRAFT = 'draft';
}
