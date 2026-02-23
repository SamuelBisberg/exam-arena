<?php

namespace App\Filament\Resources\Roles\Tables;

use App\Enums\RolesEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RolesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->formatStateUsing(fn ($state) => RolesEnum::tryFrom($state)?->label() ?? $state)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('guard_name')
                    ->label('Guard')
                    ->badge()
                    ->color('neutral')
                    ->icon(fn ($state): \Filament\Support\Icons\Heroicon => match ($state) {
                        'web' => Heroicon::GlobeEuropeAfrica,
                        'api' => Heroicon::Server,
                        default => Heroicon::QuestionMarkCircle,
                    }),
                TextColumn::make('users_count')
                    ->label('Users')
                    ->counts('users')
                    ->alignCenter()
                    ->sortable(),
                TextColumn::make('permissions_count')
                    ->label('Permissions')
                    ->counts('permissions')
                    ->alignCenter()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()->visible(fn ($record): bool => ! (bool) RolesEnum::tryFrom($record->name)),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
