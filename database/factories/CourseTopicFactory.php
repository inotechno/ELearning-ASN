<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseTopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'type_topic_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(3),
            'description' => $this->faker->paragraph(10),
            'video_url' => $this->faker->url,
            'document_url' => $this->faker->url,
            'zoom_url' => $this->faker->url,
            'start_at' => $this->faker->date(),
            'end_at' => $this->faker->date(),
            'percentage_value' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['begin', 'progress', 'finish']),
            'created_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
