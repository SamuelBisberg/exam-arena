<?php

namespace App\Filament\Resources\Univercities\Pages;

use App\Filament\Resources\Univercities\UnivercityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnivercities extends ListRecords
{
    protected static string $resource = UnivercityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
