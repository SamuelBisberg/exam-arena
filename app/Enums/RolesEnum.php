<?php

namespace App\Enums;

use App\Concerns\Trait\EnumTrait;

enum RolesEnum: string
{
    use EnumTrait;

    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => __('Admin'),
            self::MODERATOR => __('Moderator'),
            self::USER => __('User'),
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::ADMIN => __('Full access to all features and settings.'),
            self::MODERATOR => __('Can manage user content and moderate discussions.'),
            self::USER => __('Can access and use the platform with limited permissions.'),
        };
    }
}
