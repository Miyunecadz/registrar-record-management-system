<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereRelation('role', 'name', '=', RoleEnum::STUDENT->value)->get();

        foreach ($users as $user) {
            Student::factory()->create(['user_id' => $user->id]);
        }
    }
}
