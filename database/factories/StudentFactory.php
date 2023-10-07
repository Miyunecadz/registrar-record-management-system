<?php

namespace Database\Factories;

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
        $gender = rand(1,2);
        return [
            'student_number' => rand('1111111', '9999999') . '-' . $gender,
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'suffix' => Arr::random([null, 'Jr', 'Sr', 'I', 'II', 'III']),
            'sex' => $gender == 1 ? 'male' : 'female',
            'contact_number' => '09178781045',
            'birth_date' => now(),
            'birth_place' => $this->faker->address(),
            'address' => $this->faker->address(),
            'degree' => 'msit',
            'major' => 'it',
            'year_level' => rand(1, 3),
            'date_enrolled' => now()->subYear(2),
        ];
    }
}
