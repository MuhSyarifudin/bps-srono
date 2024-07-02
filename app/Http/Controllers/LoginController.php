<?php

namespace App\Http\Controllers;

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
        return view('admin.index',['title'=>'Dashboard']);
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('login.page');
    }
}
