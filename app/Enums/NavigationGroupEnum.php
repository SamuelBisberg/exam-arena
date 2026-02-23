<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum NavigationGroupEnum implements HasIcon, HasLabel
{
    case CONTENT;
    case MANAGEMENT;
    case SETTINGS;

    public function getLabel(): string
    {
        return match ($this) {
            self::SETTINGS => __('Settings'),
            self::MANAGEMENT => __('Management'),
            self::CONTENT => __('Content'),
        };
    }

    public function getIcon(): BackedEnum|Htmlable
    {
        return match ($this) {
            self::SETTINGS => Heroicon::Cog8Tooth,
            self::CONTENT => Heroicon::BookOpen,
            self::MANAGEMENT => Heroicon::WrenchScrewdriver,
        };
    }
}
