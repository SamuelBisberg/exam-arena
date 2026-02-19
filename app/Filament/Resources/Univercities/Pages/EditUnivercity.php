<?php

namespace App\Filament\Resources\Univercities\Pages;

use App\Filament\Resources\Univercities\UnivercityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUnivercity extends EditRecord
{
    protected static string $resource = UnivercityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
