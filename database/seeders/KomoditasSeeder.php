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

        $komoditas = 
        [
            ["komoditas"=>"Cabai Rawit","jumlah"=>"2000","periode_id"=>"3","sektor_id"=>"1","jenis_id"=>"1","warna"=>"#32a852"],
            ["komoditas"=>"Bawang Merah","jumlah"=>"3000","periode_id"=>"3","sektor_id"=>"1","jenis_id"=>"1","warna"=>"#32a883"],
            ["komoditas"=>"Cabai Besar","jumlah"=>"3200","periode_id"=>"3","sektor_id"=>"1","jenis_id"=>"1","warna"=>"#328da8"],
            ["komoditas"=>"Semangka","jumlah"=>"100","periode_id"=>"3","sektor_id"=>"1","jenis_id"=>"2","warna"=>"#a83232"],
            ["komoditas"=>"Jahe","jumlah"=>"100","periode_id"=>"3","sektor_id"=>"1","jenis_id"=>"3","warna"=>"#a8329b"],
            ["komoditas"=>"Laos","jumlah"=>"100","periode_id"=>"3","sektor_id"=>"1","jenis_id"=>"3","warna"=>"#4e32a8"]
        ];

        foreach ($komoditas as $each) {
            Komoditas::create($each);
        }
    }
}
