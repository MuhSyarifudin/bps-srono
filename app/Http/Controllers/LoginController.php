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
        $periode = Periode::all();

        $jumlah = Komoditas::whereNot('jenis_id','4')->where('periode_id',$periode_active->id)->sum('jumlah');

        return view('admin.index',['title'=>'Dashboard','jumlah_seluruh_komoditas'=>$jumlah,'periode_active'=>$periode_active,'periode'=>$periode]);
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('login.page');
    }
}
