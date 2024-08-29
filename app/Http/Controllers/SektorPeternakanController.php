<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komoditas;
use App\Models\JenisKomoditas;
use Illuminate\Support\Facades\DB;
use App\Models\Periode;

class SektorPeternakanController extends Controller
{
    public function index(Request $request){

        $periode = Periode::orderBy('periode','asc')->get();
        $periode_id = $request->periode ?? 0;
        $periode_sekarang = Periode::where('active','1')->first();

        $jenis = JenisKomoditas::where('sektor_id','4')->get();

        $komoditas = DB::table('komoditas')
        ->join('jenis_komoditas as jk', 'komoditas.jenis_id', '=', 'jk.id')
        ->where('komoditas.periode_id', $periode_id)
        ->where('komoditas.sektor_id','4')
        ->select('komoditas.*', 'jk.jenis_komoditas','jk.id AS jk_id')
        ->get();

        return view('tabel.peternakan',['title'=>'Sektor Peternakan','komoditas_sektor_peternakan'=>$komoditas,'periode'=>$periode,'periode_id'=>$periode_id,'periode_sekarang'=>$periode_sekarang,'jenis'=>$jenis]);
    }

    
    public function store_sektor_peternakan(Request $request){
        
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

        $pertanian = Komoditas::create([
            'komoditas'=>$request->komoditas,
            'periode_id'=>$request->periode,
            'jenis_id'=>$request->jenis,
            'jumlah'=>$request->jumlah,
            'warna'=>$request->warna,
            'sektor_id'=>4
        ]);


        return redirect()->route('index.sektor.peternakan',['periode'=>$periode_id]);
    }

    public function update_sektor_peternakan(Request $request,$id){

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

        return redirect()->route('index.sektor.peternakan',['periode'=>$periode_id]);

    }

    public function destroy_sektor_peternakan(Request $request,$id){
        
        $periode_id = $request->query('periode');
        $get_periode_id = Komoditas::where('id',$id)->delete();

        return redirect()->route('index.sektor.peternakan',['periode'=>$periode_id]);
    }
}
