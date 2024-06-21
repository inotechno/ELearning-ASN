<?php

namespace Database\Seeders;

use App\Models\InstitutionMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $institutes = [
            'SETDA', 'SETWAN', 'INSPEKTORAT', 'BAKESBANAGPOL', 'BAPENDA', 'BAPPEDA', 'BPBD', 'BKPSDM', 'BPKAD',
            'DINSOS', 'DISDUKCAPIL', 'DISHUB', 'DISKOMINFO', 'DISKOPUKMPERINDANG', 'DISNAKERTRANS', 'DISPAPORA',
            'DKP3', 'DLH', 'DP3AKB', 'DPK', 'DPKP', 'DPMPTSP', 'DPUPR', 'SATPOL PP', 'KEC CIPOCOK JAYA', 'KEC CURUG',
            'KEC KASEMEN', 'KEC TAKTAKAN', 'KEC WALANTAKA', 'DINKES', 'RSUD', 'DINDIKBUD'
        ];

        // Insert institutes into the institute_masters table if they don't already exist
        foreach ($institutes as $institute) {
            InstitutionMaster::firstOrCreate(['name' => $institute]);
        }
    }
}
