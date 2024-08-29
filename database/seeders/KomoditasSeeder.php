<?php

namespace Database\Seeders;

use App\Models\Komoditas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomoditasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('komoditas')->truncate();

        $komoditas = [[
            'komoditas' => 'Cabai rawit',
            'sektor_id'=>'1',
            'periode_id' => '3',
            'jumlah' => '8382',
            'warna'=> '#FF6384',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Bawang merah',
            'sektor_id'=>'1',
            'periode_id' => '3',
            'jumlah' => '6623',
            'warna'=> '#36A2EB',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Cabai besar',
            'sektor_id'=>'1',
            'periode_id' => '3',
            'jumlah' => '4900',
            'warna'=> '#FFCE56',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Semangka',
            'sektor_id'=>'1',
            'periode_id' => '3',
            'jumlah' => '115',
            'warna'=> '#FF6384',
            'jenis_id'=>'2'
        ],[
            'komoditas' => 'Jahe',
            'sektor_id'=>'1',
            'periode_id' => '3',
            'jumlah' => '4000',
            'warna'=> '#36A2EB',
            'jenis_id'=>'3'
        ],[
            'komoditas' => 'Laos',
            'sektor_id'=>'1',
            'periode_id' => '3',
            'jumlah' => '2100',
            'warna'=> '#4BC0C0',
            'jenis_id'=>'3'
        ]];
        
      
        foreach($komoditas as $each){
            Komoditas::create($each);
        };
    }
}
