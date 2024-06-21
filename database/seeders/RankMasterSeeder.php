<?php

namespace Database\Seeders;

use App\Models\RankMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $ranks = [
            'non asn',
            'pembina utama / iv e',
            'pembina utama madya / iv d',
            'pembina utama muda / iv c',
            'pembina tingkat 1 / iv b',
            'pembina / iv a',
            'penata tingkat 1 / iii d',
            'penata / iii c',
            'penata muda tingkat 1 / iii b',
            'penata muda / iii a',
            'pengatur tingkat 1 / ii d',
            'pengatur / ii c',
            'pengatur muda tingkat 1 / ii b',
            'pengatur muda / ii a',
            'juru tingkat / i d',
            'juru / i c',
            'juru muda tingkat 1 / i b',
            'juru muda / i a',
        ];

        // Insert ranks into the rank_masters table
        foreach ($ranks as $rank) {
            RankMaster::firstOrCreate(['name' => $rank]);
        }
    }
}
