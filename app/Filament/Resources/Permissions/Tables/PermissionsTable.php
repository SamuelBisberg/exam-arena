<?php

namespace App\Filament\Resources\Permissions\Tables;

use App\Enums\PermissionsEnum;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->formatStateUsing(fn ($state) => PermissionsEnum::tryFrom($state)?->label() ?? $state)
                    ->searchable(),
                TextColumn::make('guard_name')
                    ->badge()
                    ->icon(fn ($state): \Filament\Support\Icons\Heroicon => match ($state) {
                        'web' => Heroicon::GlobeEuropeAfrica,
                        'api' => Heroicon::Server,
                        default => Heroicon::ShieldCheck,
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                //
            ]);
    }
}
