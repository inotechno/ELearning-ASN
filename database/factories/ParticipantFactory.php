<?php

namespace Database\Factories;

use App\Models\EducationMaster;
use App\Models\InstitutionMaster;
use App\Models\RankMaster;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
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
            'institute_id' => $this->faker->optional()->randomElement(InstitutionMaster::pluck('id')->toArray()),
            'education_id' => $this->faker->optional()->randomElement(EducationMaster::pluck('id')->toArray()),
            'rank_id' => $this->faker->optional()->randomElement(RankMaster::pluck('id')->toArray()),
            'front_name' => $this->faker->firstName,
            'back_name' => $this->faker->lastName,
            'nik' => $this->faker->optional()->numerify('################'),
            'birth_place' => $this->faker->optional()->city,
            'birth_date' => $this->faker->optional()->date,
            'gender' => $this->faker->optional()->randomElement(['male', 'female']),
            'city' => $this->faker->optional()->city,
            'address' => $this->faker->optional()->address,
            'phone' => $this->faker->optional()->phoneNumber,
        ];
    }
}
