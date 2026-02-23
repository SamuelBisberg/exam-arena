<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Enums\RolesEnum;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DetachAction;
use Filament\Forms\Components\Select;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

/**
 * @property \App\Models\User $ownerRecord
 */
class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $relatedResource = RoleResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->recordActions([
                DetachAction::make(),
            ])
            ->headerActions([
                CreateAction::make(),
                AttachAction::make()
                    ->recordSelect(fn (Select $select): \Filament\Forms\Components\Select => $select->options(
                        RoleResource::getEloquentQuery()
                            ->whereNotIn('id', $this->ownerRecord->roles()->pluck('id'))
                            ->pluck('name', 'id')
                            ->mapwithKeys(fn ($name, $id): array => [$id => RolesEnum::tryFrom($name)?->label() ?? $name])
                    )),
            ]);
    }
}
