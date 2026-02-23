<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum TopicStatusEnum: string
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
            self::ACTIVE => __('Topic is active and visible to students'),
            self::INACTIVE => __('Topic is inactive and not visible to students'),
            self::DRAFT => __('Topic is in draft mode and not visible to students'),
        };
    }
}
