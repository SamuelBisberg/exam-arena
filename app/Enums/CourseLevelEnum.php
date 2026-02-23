<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum CourseLevelEnum: string
{
    use EnumTrait;

    case BACHELORS = 'bachelors';
    case ADVANCED_BACHELORS = 'advanced_bachelors';
    case MASTERS = 'masters';

    public function label(): string
    {
        return match ($this) {
            self::BACHELORS => __('Bachelor\'s'),
            self::ADVANCED_BACHELORS => __('Advanced Bachelor\'s'),
            self::MASTERS => __('Master\'s'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::BACHELORS => __('Undergraduate degree level course'),
            self::ADVANCED_BACHELORS => __('Advanced undergraduate degree level course'),
            self::MASTERS => __('Graduate degree level course'),
        };
    }
}
