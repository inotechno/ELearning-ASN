<?php

namespace Database\Seeders;

use App\Models\TypeCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeCourse::create([
            'name' => 'Moneterial',
        ]);

        TypeCourse::create([
            'name' => 'Teknis/Fungsional',
        ]);

        TypeCourse::create([
            'name' => 'Sosio Kultural',
        ]);
    }
}
