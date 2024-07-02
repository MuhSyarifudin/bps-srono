<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Periode;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('periode')->truncate();

        $periode = [[
            'periode'=>'2020'
        ],[
            'periode'=>'2021'
        ],[
            'periode'=>'2022'
        ],[
            'periode'=>'2023'
        ],[
            'periode'=>'2024',
            'active'=>1
        ]];
        
        foreach($periode as $each){
            Periode::create($each);
        }
    }
}
