<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleData = [
            [
                'name' => RoleEnum::ADMIN,
                'display_name' => RoleEnum::ADMIN->getDisplayName(),
                'description' => (RoleEnum::ADMIN)->getDescription(),
            ],
            [
                'name' => RoleEnum::REGISTRAR,
                'display_name' => RoleEnum::REGISTRAR->getDisplayName(),
                'description' => (RoleEnum::REGISTRAR)->getDescription(),
            ],
            [
                'name' => RoleEnum::STUDENT,
                'display_name' => RoleEnum::STUDENT->getDisplayName(),
                'description' => (RoleEnum::STUDENT)->getDescription(),
            ]
        ];

        $roles = Role::factory(3)
            ->sequence(fn ($sequence) => $roleData[$sequence->index])
            ->create();

        User::factory(3)
            ->sequence(fn ($sequence) => ['username' => $roles[$sequence->index]->name, 'role_id' => $roles[$sequence->index]->id])
            ->create();
    }
}
