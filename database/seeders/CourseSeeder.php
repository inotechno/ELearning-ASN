<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topicsPerCourse = 5;

        // Buat 5 course, masing-masing dengan beberapa course topic
        Course::factory()->count(5)->create()->each(function ($course) use ($topicsPerCourse) {
            // Buat course topics tanpa status
            $topics = CourseTopic::factory()->count($topicsPerCourse)->make();

            // Atur status untuk setiap topic
            $topics->each(function ($topic, $index) use ($topicsPerCourse) {
                if ($index == 0) {
                    $topic->status = 'begin';
                } elseif ($index == $topicsPerCourse - 1) {
                    $topic->status = 'finish';
                } else {
                    $topic->status = 'progress';
                }
            });

            // Simpan topics ke course
            $course->topics()->saveMany($topics);
        });
    }
}
