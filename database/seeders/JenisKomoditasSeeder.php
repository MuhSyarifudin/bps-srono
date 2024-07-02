<?php

namespace Database\Seeders;

use App\Models\JenisKomoditas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('jenis_komoditas')->truncate();

        $jenis_komoditas = [
            ['jenis'=>'sayuran'],
            ['jenis'=>'buah'],
            ['jenis'=>'biofarmaka'],
            ['jenis'=>'tanaman hias'],

        ];

        foreach($jenis_komoditas as $each){
            JenisKomoditas::create($each);
        }
    }
}
