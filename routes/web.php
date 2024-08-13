<?php

use App\Http\Controllers\DeskripsiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SektorPertanianController;
use App\Livewire\ChartLoader;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('tampilan.awal');
Route::get('/', [HomeController::class,'index_2'])->name('tampilkan.per.periode');

Route::middleware('guest')->group(function(){
    Route::get('/login',[LoginController::class,'login_page'])->name('login.page');
    Route::post('/login',[LoginController::class,'login'])->name('login');
});


Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/form/edit-deskripsi',[DeskripsiController::class,'edit_deskripsi'])->name('edit.deskripsi');
    Route::post('/form/edit-deskripsi',[DeskripsiController::class,'store_deskripsi'])->name('simpan.deskripsi');
    Route::get('/index/sektor-pertanian',[SektorPertanianController::class,'index'])->name('index.sektor.pertanian');
    // Route::get('/tambah/sektor-pertanian',[SektorPertanianController::class,'tambah_sektor_pertanian'])->name('tambah.sektor.pertanian');
    Route::post('/tambah/sektor-pertanian',[SektorPertanianController::class,'store_sektor_pertanian'])->name('simpan.sektor.pertanian');
    // Route::get('/edit/{id}/sektor-pertanian',[SektorPertanianController::class,'edit_sektor_pertanian'])->name('edit.sektor.pertanian');
    Route::post('/update/{id}/sektor-pertanian',[SektorPertanianController::class,'update_sektor_pertanian'])->name('update.sektor.pertanian');
    Route::get('/hapus/{id}/sektor-pertanian',[SektorPertanianController::class,'destroy_sektor_pertanian'])->name('hapus.sektor.pertanian');
    Route::get('/profil',[ProfilController::class,'index'])->name('index.profil');
    Route::post('/profil',[ProfilController::class,'update_profil'])->name('update.profil');
    Route::post('/password',[ProfilController::class,'update_password'])->name('update.password');
    Route::get('/periode', function (Request $request) {
        Periode::where('active','1')->update(['active'=>'0']);
        Periode::where('id',$request->periode)->update(['active'=>'1']);
        return back();
    })->name('update.periode.dashboard');
});
