<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SektorPertanian;
use App\Models\JenisKomoditas;
use App\Models\Periode;

class SektorPertanianController extends Controller
{

    public function index(Request $request){

        $periode = Periode::all();
        $periode_id = $request->periode ?? 0;

        $komoditas = SektorPertanian::where('periode_id',$periode_id)->get();

        return view('tabel.pertanian',['title'=>'Sektor Pertanian','komoditas_sektor_pertanian'=>$komoditas,'periode'=>$periode,'periode_id'=>$periode_id]);
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

    public function edit_sektor_pertanian($id){

        $komoditas = SektorPertanian::where('id',$id)->first();
        $periode = Periode::all();

        return view('form.edit.pertanian',['title'=>'Sektor Pertanian','komoditas'=>$komoditas,'periode'=>$periode]);
    }

    public function update_sektor_pertanian(Request $request,$id){

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
        
        $komoditas = SektorPertanian::where('id',$id)->update([
            'komoditas'=>$request->komoditas,
            'periode_id'=>$request->periode,
            'jumlah'=>$request->jumlah,
            'warna'=>$request->warna,
            'jenis_id'=>$request->jenis
        ]);

        
        $komoditas = SektorPertanian::where('id',$id)->first();
        $periode = Periode::all();

        return redirect()->route('edit.sektor.pertanian',['id'=>$id,'komoditas'=>$komoditas,'periode'=>$periode]);
    }

    public function destroy_sektor_pertanian($id){
        
        $get_periode_id = SektorPertanian::where('id',$id)->delete();

        return redirect()->route('index.sektor.pertanian');
    }
}
