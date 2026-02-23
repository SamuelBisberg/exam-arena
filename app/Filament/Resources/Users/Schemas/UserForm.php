<?php

namespace App\Filament\Resources\Users\Schemas;

use Carbon\CarbonInterface;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->confirmed()
                    ->required(fn ($get): bool => $get('id') === null),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required(fn ($get): bool => $get('id') === null),
                Textarea::make('two_factor_secret')
                    ->columnSpanFull(),
                Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull(),
                Checkbox::make('two_factor_confirmed_at')
                    ->formatStateUsing(fn ($state): bool => (bool) $state)
                    ->dehydrateStateUsing(fn (bool $state, mixed $record): ?CarbonInterface => $state ? ($record->two_factor_confirmed_at ?? now()) : null
                    )
                    ->label(__('Set Two Factor Authentication as confirmed')),
                Checkbox::make('email_verified_at')
                    ->formatStateUsing(fn ($state): bool => (bool) $state)
                    ->dehydrateStateUsing(fn (bool $state, mixed $record): ?CarbonInterface => $state ? ($record->email_verified_at ?? now()) : null
                    )
                    ->label(__('Set email as verified')),
            ]);
    }
}
