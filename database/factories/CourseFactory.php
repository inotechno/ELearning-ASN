<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 2),
            'type_id' => $this->faker->numberBetween(1, 3),
            'teacher_id' =>  Teacher::factory()->create()->id,
            'img_thumbnail' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'description_short' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(),
            'implementation_start' => $this->faker->date(),
            'implementation_end' => $this->faker->date(),
            'is_active' => $this->faker->boolean(),
            'created_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
