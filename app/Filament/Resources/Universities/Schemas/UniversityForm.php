<?php

namespace App\Filament\Resources\Universities\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UniversityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /** @phpstan-ignore-next-line */
                TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', str($state)->slug()))
                    ->translatableTabs(),
                /** @phpstan-ignore-next-line */
                TextInput::make('short_name')
                    ->translatableTabs(),
                TextInput::make('slug')
                    ->disabled()
                    ->columnSpanFull(),
                TextInput::make('country'),
                TextInput::make('website_url')
                    ->url(),
                TextInput::make('logo_path')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
