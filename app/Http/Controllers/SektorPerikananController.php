<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komoditas;
use App\Models\Periode;
use App\Models\JenisKomoditas;
use Illuminate\Support\Facades\DB;

class SektorPerikananController extends Controller
{
    public function index(Request $request){

        $periode = Periode::orderBy('periode','asc')->get();
        $periode_id = $request->periode ?? 0;
        $periode_sekarang = Periode::where('active','1')->first();

        $jenis = JenisKomoditas::where('sektor_id','3')->get();

        $komoditas = DB::table('komoditas')
        ->join('jenis_komoditas as jk', 'komoditas.jenis_id', '=', 'jk.id')
        ->where('komoditas.periode_id', $periode_id)
        ->where('komoditas.sektor_id','3')
        ->select('komoditas.*', 'jk.jenis_komoditas','jk.id AS jk_id')
        ->get();


        return view('tabel.perikanan',['title'=>'Sektor Perikanan','komoditas_sektor_perikanan'=>$komoditas,'periode'=>$periode,'periode_id'=>$periode_id,'periode_sekarang'=>$periode_sekarang,'jenis'=>$jenis]);
    }

    
    public function store_sektor_perikanan(Request $request){
        
        $periode_id = $request->query('periode');
        
        $request->validate([
            'komoditas'=>['required'],
            'periode'=>['required'],
            'jenis'=>['required'],
            'jumlah'=>['required'],
            'warna'=>['required']
        ],[
            'komoditas.required'=>'Tolong isi nama komoditas.',
            'periode.required'=>'Tolong pilih periode.',
            'jenis.required'=>'Tolong isi jenis komoditas.',
            'jumlah.required'=>'Tolong isi jumlah komoditas.',
            'warna.required'=>'Tolong isi warna diagram komoditas.',
        ]);

        $perkebunan = Komoditas::create([
            'komoditas'=>$request->komoditas,
            'periode_id'=>$request->periode,
            'jenis_id'=>$request->jenis,
            'jumlah'=>$request->jumlah,
            'warna'=>$request->warna,
            'sektor_id'=>3
        ]);


        return redirect()->route('index.sektor.perikanan',['periode'=>$periode_id]);
    }

    public function update_sektor_perikanan(Request $request,$id){

        $periode_id = $request->query('periode');

        $request->validate([
            'komoditas'=>['required'],
            'periode'=>['required'],
            'jenis'=>['required'],
            'jumlah'=>['required'],
            'warna'=>['required']
        ],[
            'komoditas.required'=>'Tolong isi nama komoditas.',
            'periode.required'=>'Tolong pilih periode.',
            'jenis.required'=>'Tolong isi jenis komoditas.',
            'jumlah.required'=>'Tolong isi jumlah komoditas.',
            'warna.required'=>'Tolong isi warna diagram komoditas.',
        ]);
        
        komoditas::where('id',$id)->update([
            'komoditas'=>$request->komoditas,
            'periode_id'=>$request->periode,
            'jumlah'=>$request->jumlah,
            'warna'=>$request->warna,
            'jenis_id'=>$request->jenis
        ]);

        return redirect()->route('index.sektor.perikanan',['periode'=>$periode_id]);

    }

    public function destroy_sektor_perikanan(Request $request,$id){
        
        $periode_id = $request->query('periode');
        $get_periode_id = Komoditas::where('id',$id)->delete();

        return redirect()->route('index.sektor.perikanan',['periode'=>$periode_id]);
    }
}
