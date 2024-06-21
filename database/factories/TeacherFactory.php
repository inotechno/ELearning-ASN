<?php

namespace Database\Factories;

use App\Models\EducationMaster;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'education_id' => $this->faker->randomElement(EducationMaster::pluck('id')->toArray()),
            'front_name' => $this->faker->firstName,
            'back_name' => $this->faker->lastName,
            'nik' => $this->faker->numerify('################'),
            'phone' => $this->faker->numerify('################'),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
        ];
    }
}
