<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\SektorPertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Komoditas;
use App\Models\Sektor;

class HomeController extends Controller
{
    public function index(){

        $periode = Periode::all();
        $periode_active = DB::table('periode')->where('active','1')->first();
        $sektor = Sektor::all();

        $deskripsi = DB::table('deskripsi')->first();

        $data = [
            'periode'=>$periode,
            'deskripsi'=>$deskripsi,
            'sektor'=>$sektor
        ];


        return view('welcome',$data);
    }

    public function index_2(Request $request){

        $periode = Periode::all();
        $sektor_id = $request->sektor;
        $periode_id = $request->periode;
        $sektor = Sektor::all();

        $komoditas_sayuran = Komoditas::where('jenis_id','1')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_buah = Komoditas::where('jenis_id','2')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_biofarmaka = Komoditas::where('jenis_id','3')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_tanaman_hias = Komoditas::where('jenis_id','4')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_rempah = Komoditas::where('jenis_id','5')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_kelapa = Komoditas::where('jenis_id','6')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_tembakau = Komoditas::where('jenis_id','7')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_tanaman_pangan_industri = Komoditas::where('jenis_id','8')
        ->where('periode_id',$periode_id)
        ->get();

        $deskripsi = DB::table('deskripsi')->first();

        $data = [
            'komoditas_sayuran'=>$komoditas_sayuran,
            'komoditas_buah'=>$komoditas_buah,
            'komoditas_biofarmaka'=>$komoditas_biofarmaka,
            'komoditas_tanaman_hias'=>$komoditas_tanaman_hias,
            'komoditas_rempah'=>$komoditas_rempah,
            'komoditas_kelapa'=>$komoditas_kelapa,
            'komoditas_tembakau'=>$komoditas_tembakau,
            'komoditas_tanaman_pangan_industri'=>$komoditas_tanaman_pangan_industri,
            'periode'=>$periode,'periode_id'=>$periode_id,
            'deskripsi'=>$deskripsi,
            'sektor'=>$sektor,
            'sektor_id'=>$sektor_id
        ];

        return view('welcome',$data);
    }
}
