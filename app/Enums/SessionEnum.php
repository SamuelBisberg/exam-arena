<?php

namespace App\Enums;

use App\Traits\EnumTrait;

enum SessionEnum: string
{
    use EnumTrait;

    case A = 'A';
    case B = 'B';
    case C = 'C';
    case SPECIAL = 'SPECIAL';

    public function label(): string
    {
        return match ($this) {
            self::A => __('Session A'),
            self::B => __('Session B'),
            self::C => __('Session C'),
            self::SPECIAL => __('Special Session'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::A => __('The first session of the semester.'),
            self::B => __('The second session of the semester.'),
            self::C => __('The third session of the semester.'),
            self::SPECIAL => __('A special session outside the regular schedule.'),
        };
    }
}
