<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\SektorPertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $periode = Periode::all();
        $periode_active = DB::table('periode')->where('active','1')->first();
        
        $komoditas_sayuran = SektorPertanian::where('jenis_id','1')
        ->where('periode_id',$periode_active)
        ->get();

        $komoditas_buah = SektorPertanian::where('jenis_id','2')
        ->where('periode_id',$periode_active)
        ->get();
        
        $komoditas_biofarmaka = SektorPertanian::where('jenis_id','3')
        ->where('periode_id',$periode_active)
        ->get();

        $komoditas_tanaman_hias = SektorPertanian::where('jenis_id','4')
        ->where('periode_id',$periode_active)
        ->get();

        $deskripsi = DB::table('deskripsi')->first();

        return view('welcome',['komoditas_sayuran'=>$komoditas_sayuran,'komoditas_buah'=>$komoditas_buah,'komoditas_biofarmaka'=>$komoditas_biofarmaka,'komoditas_tanaman_hias'=>$komoditas_tanaman_hias,'periode'=>$periode,'deskripsi'=>$deskripsi]);
    }

    public function index_2(Request $request){

        $periode = Periode::all();
        $periode_id = $request->periode;

        $komoditas_sayuran = SektorPertanian::where('jenis_id','1')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_buah = SektorPertanian::where('jenis_id','2')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_biofarmaka = SektorPertanian::where('jenis_id','3')
        ->where('periode_id',$periode_id)
        ->get();

        $komoditas_tanaman_hias = SektorPertanian::where('jenis_id','4')
        ->where('periode_id',$periode_id)
        ->get();

        $deskripsi = DB::table('deskripsi')->first();

        return view('welcome',['komoditas_sayuran'=>$komoditas_sayuran,'komoditas_buah'=>$komoditas_buah,'komoditas_biofarmaka'=>$komoditas_biofarmaka,'komoditas_tanaman_hias'=>$komoditas_tanaman_hias,'periode'=>$periode,'periode_id'=>$periode_id,'deskripsi'=>$deskripsi]);
    }
}
