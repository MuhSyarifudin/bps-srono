<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{
    public function index(){
        return view('admin.profil.index',['title'=>'User Profil']);
    }

    public function updateProfil(Request $request){
                
        $request->validate([
            'nama'=>'required|max:30',
            'email'=>'required|email',
            'username'=>'required|min:8',
            'password'=>'required',
            'avatar'=>'mimes:jpg,png,gif|max:2048'
        ]);
    
        $datavalidate = [
            'username'=>Auth::user()->username,
            'password'=>$request->password];

            
            if(Auth::validate($datavalidate)){
                
            if($request->file('avatar')){
                $imageName = 'user-'.Auth::user()->id.'.'.$request->file('avatar')->extension();
                // dd($imageName);
                File::delete(public_path(),Auth::user()->avatars);
                $request->file('avatar')->move(public_path('assets/avatars/'),$imageName);
            } else {
                $imageName = '';
            }

            User::find(Auth::user()->id)->update([
                'name'=>$request->nama,
                'email'=>$request->email,
                'username'=>$request->username,
                'avatars'=>$imageName
            ]);
            
            return back();

        } else {
            return back()->with(['message1'=>'Password yang anda masukan salah !']);
        }
        // redirect()->route('index.profil');
    }
}
