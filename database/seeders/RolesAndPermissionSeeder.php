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

        foreach (RolesEnum::cases() as $role) {
            $createdRole = Role::firstOrCreate(['name' => $role->value]);

            foreach ($this->getPermissionsForRole($role) as $permission) {
                $createdPermission = Permission::firstOrCreate(['name' => $permission->value]);
                $createdRole->givePermissionTo($createdPermission);
            }
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    protected function getPermissionsForRole(RolesEnum $role): array
    {
        return match ($role) {
            RolesEnum::ADMIN => PermissionsEnum::cases(),
            RolesEnum::MODERATOR => [PermissionsEnum::EDIT_CONTENT, PermissionsEnum::MODERATE_COMMENTS],
            RolesEnum::USER => [],
        };
    }
}
