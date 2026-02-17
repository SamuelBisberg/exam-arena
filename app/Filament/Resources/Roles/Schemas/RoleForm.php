<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Role Name')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Radio::make('guard_name')
                    ->label('Guard')
                    ->options([
                        'web' => 'Web',
                        'api' => 'API',
                    ])
                    ->descriptions([
                        'web' => 'Used for typical web authentication.',
                        'api' => 'Used for API token authentication.',
                    ])
                    ->default('web')
                    ->required(),

            ]);
    }
}
