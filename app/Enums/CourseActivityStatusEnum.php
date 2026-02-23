<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum CourseActivityStatusEnum: string
{
    use EnumTrait;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DRAFT = 'draft';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => __('Active'),
            self::INACTIVE => __('Inactive'),
            self::DRAFT => __('Draft'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::ACTIVE => __('Course activity is active and visible to students'),
            self::INACTIVE => __('Course activity is inactive and not visible to students'),
            self::DRAFT => __('Course activity is in draft mode and not visible to students'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::ACTIVE => '#16a34a',
            self::INACTIVE => '#4b5563',
            self::DRAFT => '#ca8a04',
        };
    }
}
