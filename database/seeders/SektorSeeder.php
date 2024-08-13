<?php

namespace Database\Seeders;

use App\Models\Sektor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sektor = [
            ["nama_sektor"=>"pertanian"],
            ["nama_sektor"=>"perkebunan"],
            ["nama_sektor"=>"perikanan"]
        ];

        foreach ($sektor as $each) {
            Sektor::create($each);
        };
    }
}
