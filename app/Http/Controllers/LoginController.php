<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use App\Models\Periode;
use App\Models\SektorPertanian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Tolong masukan username',
            'password.required'=>'Tolong masukan password'
        ]);

        $datalogin = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if (Auth::attempt($datalogin)) {
            Session::put('login',TRUE);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login.page')->withErrors('Maaf user tidak ditemukan');
        };
    }

    public function login_page(){
        
        return view('login.login');
    }

    public function dashboard(){

        $periode_active = Periode::where('active','1')->first();
        $periode = Periode::orderBy('periode','asc')->get();

        $jumlah_komoditas_pertanian = Komoditas::where('periode_id',$periode_active->id)->where('sektor_id','1')->count();
        $jumlah_komoditas_perkebunan = Komoditas::where('periode_id',$periode_active->id)->where('sektor_id','2')->count();
        $jumlah_komoditas_perikanan = Komoditas::where('periode_id',$periode_active->id)->where('sektor_id','3')->count();
        $jumlah_komoditas_peternakan = Komoditas::where('periode_id',$periode_active->id)->where('sektor_id','4')->count();

        $array= [];

        foreach ($periode as $key => $value) {
            $jumlah = Komoditas::whereNot('jenis_id','4')->where('sektor_id','1')->where('periode_id',$value->id)->sum('jumlah');
            array_push($array,$jumlah);
        };

        $array1 = [];
        
        foreach ($periode as $key => $value) {
            $jumlah = Komoditas::where('sektor_id','2')->where('periode_id',$value->id)->sum('jumlah');
            array_push($array1,$jumlah);
        }

        $array2 = [];

        foreach ($periode as $key => $value) {
            $jumlah = Komoditas::where('sektor_id','3')->where('periode_id',$value->id)->sum('jumlah');
            array_push($array2,$jumlah);
        }

        return view('admin.dashboard',['title'=>'Dashboard',
        'jumlah'=>$array,
        'jumlah1'=>$array1,
        'jumlah2'=>$array2,
        'jumlah_komoditas_pertanian'=>$jumlah_komoditas_pertanian,'jumlah_komoditas_perkebunan'=>$jumlah_komoditas_perkebunan,'jumlah_komoditas_pertanian'=>$jumlah_komoditas_pertanian,'jumlah_komoditas_perkebunan'=>$jumlah_komoditas_perkebunan,'jumlah_komoditas_perikanan'=>$jumlah_komoditas_perikanan,'jumlah_komoditas_peternakan'=>$jumlah_komoditas_peternakan,'periode_active'=>$periode_active,'periode'=>$periode]);
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('login.page');
    }
}
