<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();

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
            ],
        ];

        $roles = Role::factory(3)
            ->sequence(fn ($sequence) => $roleData[$sequence->index])
            ->create();
    }
}
