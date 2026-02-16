<?php

namespace App\Filament\Resources\Permissions;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use App\Filament\Resources\Permissions\Pages\CreatePermission;
use App\Filament\Resources\Permissions\Pages\EditPermission;
use App\Filament\Resources\Permissions\Pages\ListPermissions;
use App\Filament\Resources\Permissions\Schemas\PermissionForm;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ShieldCheck;

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PermissionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Permission')
                    ->formatStateUsing(fn($state) => PermissionsEnum::tryFrom($state)?->label() ?? $state)
                    ->sortable()
                    ->searchable(),

                ...Role::all()->map(
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
                EditAction::make(),
            ])
            ->paginated(false)
            ->modifyQueryUsing(fn($query) => $query->with('roles'));
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPermissions::route('/'),
            'create' => CreatePermission::route('/create'),
            'edit' => EditPermission::route('/{record}/edit'),
        ];
    }
}
