<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        collect(PermissionsEnum::cases())
            ->each(fn(PermissionsEnum $permission) => Permission::firstOrCreate(['name' => $permission->value]));

        collect(RolesEnum::cases())
            ->each(
                fn(RolesEnum $role) => Role::firstOrCreate(['name' => $role->value])
                    ->syncPermissions($this->getPermissionsForRole($role))
            );
    }

    protected function getPermissionsForRole(RolesEnum $role): array
    {
        return match ($role) {
            RolesEnum::ADMIN => PermissionsEnum::cases(),
            RolesEnum::MODERATOR => [
                PermissionsEnum::EDIT_CONTENT,
                PermissionsEnum::MODERATE_COMMENTS,
                PermissionsEnum::VIEW_HIDDEN_CONTENT
            ],
            RolesEnum::USER => [],
        };
    }
}
