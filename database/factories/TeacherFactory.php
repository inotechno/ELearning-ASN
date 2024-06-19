<?php

namespace Database\Factories;

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
            'card_number' => $this->faker->numberBetween(100000, 999999),
            'join_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-50 years', '-17 years'),
            'tempat_lahir' => $this->faker->city,
            'bpjs_kesehatan' => $this->faker->numberBetween(1000000000, 9999999999),
            'bpjs_ketenagakerjaan' => $this->faker->numberBetween(1000000000, 9999999999),
            'bank_name' => $this->faker->name,
            'no_rekening' => $this->faker->numberBetween(100000000000, 999999999999),
            'pemilik_rekening' => $this->faker->name,
        ];
    }
}
