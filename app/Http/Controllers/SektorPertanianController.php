<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SektorPertanian;
use App\Models\JenisKomoditas;
use App\Models\Periode;

class SektorPertanianController extends Controller
{

    public function index(){

        $komoditas = SektorPertanian::all();

        return view('tabel.pertanian',['title'=>'Sektor Pertanian','komoditas_sektor_pertanian'=>$komoditas]);
    }

    public function tambah_sektor_pertanian(){

        $periode = Periode::all();
        $jenis = JenisKomoditas::all();

        return view('form.pertanian',['title'=>'Sektor Pertanian','periode'=>$periode,'jenis'=>$jenis]);
    }

    public function store_sektor_pertanian(Request $request){
        
        // dd($request->warna);

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

        SektorPertanian::create([
            'komoditas'=>$request->komoditas,
            'periode_id'=>$request->periode,
            'jenis_id'=>$request->jenis,
            'jumlah'=>$request->jumlah,
            'warna'=>$request->warna
        ]);


        return redirect()->route('tambah.sektor.pertanian');
    }
}
