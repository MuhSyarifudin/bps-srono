<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SektorPertanian;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartLoader extends Component
{
    public function render(Request $request)
    {
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

        return view('livewire.chart-loader',['komoditas_sayuran'=>$komoditas_sayuran,'komoditas_buah'=>$komoditas_buah,'komoditas_biofarmaka'=>$komoditas_biofarmaka,'komoditas_tanaman_hias'=>$komoditas_tanaman_hias,'periode'=>$periode,'periode_id'=>$periode_id,'deskripsi'=>$deskripsi]);
    }

    public function show_chart(Request $request){
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
