<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum VisibilityStatusEnum: string
{
    use EnumTrait;

    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case ARCHIVED = 'archived';
    case UNAVAILABLE = 'unavailable';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => __('Draft'),
            self::PUBLISHED => __('Published'),
            self::ARCHIVED => __('Archived'),
            self::UNAVAILABLE => __('Unavailable'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::DRAFT => __('This item is in draft status and not visible.'),
            self::PUBLISHED => __('This item is published and visible.'),
            self::ARCHIVED => __('This item is archived and not visible.'),
            self::UNAVAILABLE => __('This item is unavailable and not visible.'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DRAFT => 'gray',
            self::PUBLISHED => 'success',
            self::ARCHIVED => 'warning',
            self::UNAVAILABLE => 'danger',
        };
    }
}
