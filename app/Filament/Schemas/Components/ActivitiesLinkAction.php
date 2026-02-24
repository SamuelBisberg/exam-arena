<?php

namespace App\Filament\Schemas\Components;

use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;

class ActivitiesLinkAction
{
    /**
     * @param  class-string<\Filament\Resources\Resource>  $resource
     */
    public static function make(string $resource, ?string $name = null, ?string $label = null): Action
    {
        return Action::make($name ?? 'activities')
            ->label($label ?? __('Activities'))
            ->icon(Heroicon::ArchiveBox)
            ->color('info')
            ->url(fn ($record): string => $resource::getUrl('activities', ['record' => $record]));
    }
}
