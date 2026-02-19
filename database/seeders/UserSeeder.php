<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => config('app.admin.email'),
        ], [
            'name' => config('app.admin.name'),
            'password' => bcrypt(config('app.admin.password')),
        ])->assignRole(RolesEnum::ADMIN);
    }
}
