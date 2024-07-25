<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use App\Models\JenisKomoditas;
use App\Models\Periode;
use App\Models\SektorPertanian;
use DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        $image = $request->file('poster');
        
        if ($image) {
            File::delete(public_path(),$deskripsi->image);
            
            $imageName = 'poster.'.$request->file('poster')->extension();

            $deskripsi->image = $imageName;
            $deskripsi->save();

            $request->file('poster')->move(public_path(),$imageName);
        }
        
        return redirect()->route('edit.deskripsi');
    }

    
}
