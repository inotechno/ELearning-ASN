<?php

namespace Database\Seeders;

use App\Models\CategoryCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryCourse::create([
            'name' => 'TA2024',
            'slug' => 'ta2024'
        ]);

        CategoryCourse::create([
            'name' => 'TA2025',
            'slug' => 'ta2025'
        ]);
    }
}
