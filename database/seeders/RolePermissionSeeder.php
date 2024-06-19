<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrator = Role::create([
            'name' => 'administrator',
            'guard_name' => 'web'
        ]);

        $teacher = Role::create([
            'name' => 'teacher',
            'guard_name' => 'web'
        ]);

        $participant = Role::create([
            'name' => 'participant',
            'guard_name' => 'web'
        ]);
    }
}
