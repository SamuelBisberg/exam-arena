<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum SemesterEnum: string
{
    use EnumTrait;

    case SPRING = 'Spring';
    case SUMMER = 'Summer';
    case FALL = 'Fall';

    public function label(): string
    {
        return match ($this) {
            self::SPRING => __('Spring'),
            self::SUMMER => __('Summer'),
            self::FALL => __('Fall'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::SPRING => __('The Spring semester typically runs from January to May.'),
            self::SUMMER => __('The Summer semester typically runs from June to August.'),
            self::FALL => __('The Fall semester typically runs from September to December.'),
        };
    }
}
