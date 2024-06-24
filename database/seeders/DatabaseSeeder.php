<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Participant;
use App\Models\Teacher;
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

        Teacher::create([
            'user_id' => $teacher->id,
            'education_id' => 1, // Sesuaikan dengan id yang sesuai di tabel education_masters
            'front_name' => 'Teacher',
            'back_name' => 'Smith',
            'nik' => '1234567890123456',
            'phone' => '1234567890',
            'address' => 'Teacher Address',
            'city' => 'Teacher City',
        ]);

        $participant = User::create([
            'name' => 'Participant',
            'username' => 'participant',
            'email' => 'participant@app.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'IAYSUAYnas',
        ]);

        $participant->assignRole('participant');

        Participant::create([
            'user_id' => $participant->id,
            'institution_id' => 1, // Sesuaikan dengan id yang sesuai di tabel institution_masters
            'education_id' => 1, // Sesuaikan dengan id yang sesuai di tabel education_masters
            'rank_id' => 1, // Sesuaikan dengan id yang sesuai di tabel rank_masters
            'front_name' => 'Participant',
            'back_name' => 'Doe',
            'nik' => '1234567890123456',
            'birth_place' => 'Participant Birth Place',
            'birth_date' => '1990-01-01',
            'gender' => 'Male',
            'city' => 'Participant City',
            'address' => 'Participant Address',
            'phone' => '0987654321',
        ]);

        User::factory(10)->create();

        $this->call([
            CategoryCourseSeeder::class,
            TypeCourseSeeder::class,
            TypeTopicSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
