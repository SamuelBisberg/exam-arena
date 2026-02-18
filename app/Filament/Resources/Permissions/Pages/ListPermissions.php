<?php

namespace App\Filament\Resources\Permissions\Pages;

use App\Filament\Resources\Permissions\PermissionResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;


class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    /**
     * Override the default table configuration to include role assignment toggles for each permission.
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Permission')
                    ->formatStateUsing(fn($state) => PermissionsEnum::tryFrom($state)?->label() ?? $state)
                    ->sortable()
                    ->searchable(),

                ...Role::query()
                    ->orderBy('id')
                    ->get()
                    ->map(
                        fn(Role $role) => ToggleColumn::make('role_' . $role->id)
                            ->alignCenter()
                            ->label(RolesEnum::tryFrom($role->name)?->label() ?? $role->name)
                            ->state(fn($record) => $record->roles->contains($role))
                            ->disabled(fn() => $role->name === RolesEnum::ADMIN->value)
                            ->updateStateUsing(
                                fn($record, $state) => $state
                                    ? $record->assignRole($role)
                                    : $record->removeRole($role)
                            )
                    )->toArray(),
            ])
            ->recordActions([
                //
            ])
            ->paginated(false)
            ->modifyQueryUsing(fn($query) => $query->with('roles'));
    }
}
