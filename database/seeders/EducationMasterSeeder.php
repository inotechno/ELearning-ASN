<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educations = [
            'Tidak Sekolah',
            'SD Sederajat',
            'SMP Sederajat',
            'SMA Sederajat',
            'D1',
            'D2',
            'D3',
            'D4',
            'S1',
            'S2',
            'S3'
        ];

        foreach ($educations as $education) {
            \App\Models\EducationMaster::create([
                'name' => $education
            ]);
        }

    }
}
