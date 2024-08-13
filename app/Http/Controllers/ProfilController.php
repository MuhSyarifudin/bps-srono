<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class ProfilController extends Controller
{
    public function index(){
        return view('admin.profil.index',['title'=>'User Profil']);
    }

    public function update_profil(Request $request){
                
        $request->validate([
            'nama'=>'required|max:40',
            'email'=>'required|'.Rule::unique('users','email')->ignore(Auth::user()->id),
            'username'=>'required|min:8|'. Rule::unique('users', 'username')->ignore(Auth::user()->id),
            'password'=>'required',
            'avatar'=>'mimes:jpg,png,gif|max:2048'
        ],['nama.required'=>'mohon masukan nama anda.',
            'nama.max'=>'nama tidak boleh lebih dari 40 karakter.',
            'email.required'=>'mohon masukan email.',
            'email.unique'=>'email tidak boleh sama.',
            'username.required'=>'mohon masukan username anda.',
            'username.min'=>'username minimal adalah 8 karakter.',
            'username.unique'=>'username tidak boleh sama.',
            'password.required'=>'mohon masukan password untuk mengganti profil.',
            'avatar.max'=>'batas maksimum gambar adalah 2 MB.'
        ]);
    
        $datavalidate = [
            'username'=>Auth::user()->username,
            'password'=>$request->password];

            
            if(Auth::validate($datavalidate)){
                
            if($request->file('avatar')){
                $file = $request->file('avatar');
                $image = Image::make($file);
                $imageName = 'user-'.Auth::user()->id.'.'.$request->file('avatar')->extension();
                File::delete(public_path(),Auth::user()->avatars);
                $image->save(public_path('assets/avatars/').$imageName,90);
                
                $image->fit(300, 300, function($constraint) {
                    $constraint->aspectRatio();
                });
                
                $image->save(public_path('assets/avatars/').$imageName,90);
                
            } else {
                $imageName = Auth::user()->avatars;
            }

            User::find(Auth::user()->id)->update([
                'name'=>$request->nama,
                'email'=>$request->email,
                'username'=>$request->username,
                'avatars'=>$imageName
            ]);
            
            return back();

        } else {
            return back()->with(['error1'=>'Password yang anda masukan salah !']);
        }
    }

    public function update_password(Request $request){

        $request->validate([
            'repassword'=>'required',
            'newpassword'=>'required',
            'currentpassword'=>'required|min:8'
        ],[
            'newpassword.required'=>'mohon masukan password baru anda.',
            'repassword.required'=>'mohon masukan kembali password baru anda.',
            'currentpassword.required'=>'mohon masukan password lama untuk mengganti password.'
        ]);

        $password = $request->currentpassword;
        $newPassword = $request->newpassword;
        $repassword = $request->repassword;

        $datavalidate = [
            'username'=>Auth::user()->username,
            'password'=>$password
        ];

        if ($newPassword == $repassword) {
            if (Auth::attempt($datavalidate)) {
                User::find(Auth::user()->id)->update([
                    'password'=>Hash::make($newPassword)
                ]);
    
                return back()->with('success2','Password berhasil diganti');
            } else {
                return back()->with('error2','Password Salah !');
            }            
        } else {
            return back()->with('error2','Password baru dan re password harus sama !');
        }

    }
}
