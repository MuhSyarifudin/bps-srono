<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JenisKomoditas;

class JenisKomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_komoditas = [
        ["jenis_komoditas"=>"Sayuran","sektor_id"=>"1"],
        ["jenis_komoditas"=>"Buah","sektor_id"=>"1"],
        ["jenis_komoditas"=>"Biofarmaka","sektor_id"=>"1"],
        ["jenis_komoditas"=>"Tanaman Hias","sektor_id"=>"1"]];

        foreach ($jenis_komoditas as $each) {
            JenisKomoditas::create($each);
        }
    }
}
