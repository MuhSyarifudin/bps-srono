<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use App\Models\JenisKomoditas;
use App\Models\Periode;
use App\Models\SektorPertanian;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeskripsiController extends Controller
{
    public function edit_deskripsi(){
        $deskripsi = DB::table('deskripsi')->first();
        return view('form.deskripsi',['title'=>'Deskripsi','deskripsi'=>$deskripsi]);
    }

    public function store_deskripsi(Request $request){
        $deskripsi = Deskripsi::find('1');
        $deskripsi->deskripsi = $request->deskripsi;

        $deskripsi->save();
        
        return redirect()->route('edit.deskripsi');
    }

    
}
