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
            'periode_id' => '3',
            'jumlah' => '8382',
            'warna'=> 'rgba(255, 99, 132, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Bawang merah',
            'periode_id' => '3',
            'jumlah' => '6623',
            'warna'=> 'rgba(54, 162, 235, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Cabai besar',
            'periode_id' => '3',
            'jumlah' => '4900',
            'warna'=>'rgba(255, 206, 86, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Bawang putih',
            'periode_id' => '3',
            'jumlah' => '0',
            'warna'=>'rgba(75, 192, 192, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Kacang Panjang',
            'periode_id' => '3',
            'jumlah' => '0',
            'warna' => 'rgba(153, 102, 255, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Kentang',
            'periode_id' => '3',
            'jumlah' => '0',
            'warna'=>'rgba(255, 159, 64, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Kubis',
            'periode_id' => '3',
            'jumlah' => '0',
            'warna' => 'rgba(255, 159, 64, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Tomat',
            'periode_id' => '3',
            'jumlah' => '0',
            'warna'=>'rgba(255, 159, 64, 1)',
            'jenis_id'=>'1'
        ],[
            'komoditas' => 'Semangka',
            'periode_id' => '3',
            'jumlah' => '115',
            'warna'=>'rgba(255, 99, 132, 1)',
            'jenis_id'=>'2'
        ],[
            'komoditas' => 'Melon',
            'periode_id' => '3',
            'jumlah' => '0',
            'warna'=>'rgba(54, 162, 235, 1)',
            'jenis_id'=>'2'
        ],[
            'komoditas' => 'Jahe',
            'periode_id' => '3',
            'jumlah' => '4000',
            'warna'=>'rgba(54, 162, 235, 1)',
            'jenis_id'=>'3'
        ],[
            'komoditas' => 'Laos',
            'periode_id' => '3',
            'jumlah' => '2100',
            'warna'=>'rgba(54, 162, 235, 1)',
            'jenis_id'=>'3'
        ]];
      
        foreach($komoditas as $each){
            SektorPertanian::create($each);
        };
    }
}
