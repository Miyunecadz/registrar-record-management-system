<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = rand(1, 2);

        return [
            'user_id' => User::inRandomOrder()
                ->whereHas('role', fn ($query) => $query->where('name', RoleEnum::STUDENT))->first()?->id,
            'student_number' => rand(1111111, 9999999)."-$gender",
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'sex' => $gender == 1 ? GenderEnum::MALE : GenderEnum::FEMALE,
            'contact_number' => '09178781045',
            'birth_date' => $this->faker->date('Y-m-d'),
            'birth_place' => $this->faker->address,
            'address' => $this->faker->address,
            'degree' => Arr::random(['BSIT', 'BSED', 'CRIM', 'BIT', 'HRM']),
            'major' => 'N/A',
            'year_level' => rand(1, 4),
            'date_enrolled' => $this->faker->date('Y-m-d'),
        ];
    }
}
