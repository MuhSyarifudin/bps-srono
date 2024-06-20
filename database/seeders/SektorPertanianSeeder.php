<?php

namespace Database\Seeders;

use App\Models\SektorPertanian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SektorPertanianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('sektor_pertanian')->truncate();

        $komoditas = [[
            'komoditas' => 'Cabai rawit',
            'periode_id' => '5',
            'jumlah' => '8382',
            'warna'=> 'rgba(255, 99, 132, 1)'
                    ],[
            'komoditas' => 'Bawang merah',
            'periode_id' => '5',
            'jumlah' => '6623',
            'warna'=> 'rgba(54, 162, 235, 1)'
        ],[
            'komoditas' => 'Cabai besar',
            'periode_id' => '5',
            'jumlah' => '4900',
            'warna'=>'rgba(255, 206, 86, 1)'
        ],[
            'komoditas' => 'Bawang putih',
            'periode_id' => '5',
            'jumlah' => '0',
            'warna'=>'rgba(75, 192, 192, 1)'
        ],[
            'komoditas' => 'Kacang Panjang',
            'periode_id' => '5',
            'jumlah' => '0',
            'warna' => 'rgba(153, 102, 255, 1)'
        ],[
            'komoditas' => 'Kentang',
            'periode_id' => '5',
            'jumlah' => '0',
            'warna'=>'rgba(255, 159, 64, 1)'
        ],[
            'komoditas' => 'Kubis',
            'periode_id' => '5',
            'jumlah' => '0',
            'warna' => 'rgba(255, 159, 64, 1)'
        ],[
            'komoditas' => 'Tomat',
            'periode_id' => '5',
            'jumlah' => '0',
            'warna'=>'rgba(255, 159, 64, 1)'
        ]];
      
        foreach($komoditas as $each){
            SektorPertanian::create($each);
        };
    }
}
