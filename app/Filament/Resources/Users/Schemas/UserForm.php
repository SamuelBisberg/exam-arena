<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
                    ->required(fn($get) => $get('id') === null),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required(fn($get) => $get('id') === null),
                Textarea::make('two_factor_secret')
                    ->columnSpanFull(),
                Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull(),
                Checkbox::make('two_factor_confirmed_at')
                    ->formatStateUsing(fn($state) => $state ? true : false)
                    ->dehydrateStateUsing(fn(bool $state) => $state ? now() : null)
                    ->label(__('Set Two Factor Authentication as confirmed')),
                Checkbox::make('email_verified_at')
                    ->formatStateUsing(fn($state) => $state ? true : false)
                    ->dehydrateStateUsing(fn(bool $state) => $state ? now() : null)
                    ->label(__('Set email as verified')),
            ]);
    }
}
