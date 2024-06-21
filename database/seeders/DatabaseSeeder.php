<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(InstitutionMasterSeeder::class);
        $this->call(RankMasterSeeder::class);
        $this->call(EducationMasterSeeder::class);
        $this->call(RolePermissionSeeder::class);
       
        $administrator = User::create([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'admin@app.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'IAYSUAYnas',
        ]);

        $administrator->assignRole('administrator');

        $teacher = User::create([
            'name' => 'Teacher',
            'username' => 'teacher',
            'email' => 'teacher@app.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'IAYSUAYnas',
        ]);

        $teacher->assignRole('teacher');

        $participant = User::create([
            'name' => 'Participant',
            'username' => 'participant',
            'email' => 'participant@app.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'IAYSUAYnas',
        ]);

        $participant->assignRole('participant');

        User::factory(10)->create();

        $this->call([
            CategoryCourseSeeder::class,
            TypeCourseSeeder::class,
            TypeTopicSeeder::class,
            CourseSeeder::class,
        ]);

    }
}
