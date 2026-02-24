<?php

namespace App\Filament\Schemas\Components;

use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Livewire\Component;

class ActivitiesLinkAction extends Component
{
    /**
     * @param  class-string<resource>  $resource
     */
    public static function make(string $resource, ?string $name = null): Action
    {
        return Action::make($name ?? __('Activities'))
            ->label('Activities')
            ->icon(Heroicon::ArchiveBox)
            ->color('info')
            ->url(fn ($record): string => $resource::getUrl('activities', ['record' => $record]));
    }
}
