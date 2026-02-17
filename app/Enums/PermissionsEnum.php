<?php

namespace App\Enums;

use App\Concerns\Trait\EnumTrait;

enum PermissionsEnum: string
{
    use EnumTrait;

    case VIEW_ADMIN_PANEL = 'view_admin_panel';
    case MANAGE_USERS = 'manage_users';
    case EDIT_CONTENT = 'edit_content';
    case MODERATE_COMMENTS = 'moderate_comments';
    case IMPERSONATE_USERS = 'impersonate_users';

    public function label(): string
    {
        return match ($this) {
            self::VIEW_ADMIN_PANEL => __('View Admin Panel'),
            self::MANAGE_USERS => __('Manage Users'),
            self::EDIT_CONTENT => __('Edit Content'),
            self::MODERATE_COMMENTS => __('Moderate Comments'),
            self::IMPERSONATE_USERS => __('Impersonate Users'), 
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::VIEW_ADMIN_PANEL => __('Allows access to the admin dashboard and its features.'),
            self::MANAGE_USERS => __('Allows managing user accounts, including creating, editing, and deleting users.'),
            self::EDIT_CONTENT => __('Allows editing of content across the platform.'),
            self::MODERATE_COMMENTS => __('Allows moderating user comments, including approving, editing, and deleting comments.'),
            self::IMPERSONATE_USERS => __('Allows impersonating other users to see the application from their perspective.'),
        };
    }
}
