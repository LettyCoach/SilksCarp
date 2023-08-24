<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tariff::create([
            'from'=>'0',
            'to'=>'200000'
        ]);
        Tariff::create([
            'from'=>'200000',
            'to'=>'500000'
        ]);
        Tariff::create([
            'from'=>'500000',
            'to'=>'1000000'
        ]);
        Tariff::create([
            'from'=>'1000000',
            'to'=>'2000000'
        ]);
        Tariff::create([
            'from'=>'2000000',
            'to'=>'5000000'
        ]);
        Tariff::create([
            'from'=>'5000000',
            'to'=>'10000000'
        ]);
        Tariff::create([
            'from'=>'10000000',
            'to'=>''
        ]);
    }
}
