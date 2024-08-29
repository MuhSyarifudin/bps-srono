<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Komoditas;
use App\Models\Sektor;

class HomeController extends Controller
{
    public function index(){

        $periode = Periode::orderBy('periode','asc')->get();
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

        $periode = Periode::orderBy('periode','asc')->get();
        $sektor_id = $request->sektor;
        $periode_id = $request->periode;
        $sektor = Sektor::all();
        $deskripsi = DB::table('deskripsi')->first();

        $data = [
            'periode'=>$periode,
            'periode_id'=>$periode_id,
            'deskripsi'=>$deskripsi,
            'sektor'=>$sektor,
            'sektor_id'=>$sektor_id
        ];

        return view('welcome',$data);
    }
}
