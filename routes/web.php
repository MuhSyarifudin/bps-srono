<?php

use App\Http\Controllers\DeskripsiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SektorPerikananController;
use App\Http\Controllers\SektorPerkebunanController;
use App\Http\Controllers\SektorPertanianController;
use App\Http\Controllers\SektorPeternakanController;
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
    //Route Pertanian
    Route::get('/index/sektor-pertanian',[SektorPertanianController::class,'index'])->name('index.sektor.pertanian');
    Route::post('/tambah/sektor-pertanian',[SektorPertanianController::class,'store_sektor_pertanian'])->name('simpan.sektor.pertanian');
    Route::post('/update/{id}/sektor-pertanian',[SektorPertanianController::class,'update_sektor_pertanian'])->name('update.sektor.pertanian');
    Route::get('/hapus/{id}/sektor-pertanian',[SektorPertanianController::class,'destroy_sektor_pertanian'])->name('hapus.sektor.pertanian');
    //Route Perkebunan
    Route::get('/index/sektor-perkebunan',[SektorPerkebunanController::class,'index'])->name('index.sektor.perkebunan');
    Route::post('/tambah/sektor-perkebunan',[SektorPerkebunanController::class,'store_sektor_perkebunan'])->name('simpan.sektor.perkebunan');
    Route::post('/update/{id}/sektor-perkebunan',[SektorPerkebunanController::class,'update_sektor_perkebunan'])->name('update.sektor.perkebunan');
    Route::get('/hapus/{id}/sektor-perkebunan',[SektorPerkebunanController::class,'destroy_sektor_perkebunan'])->name('hapus.sektor.perkebunan');
    //Route Perikanan
    Route::get('/index/sektor-perikanan',[SektorPerikananController::class,'index'])->name('index.sektor.perikanan');
    Route::post('/tambah/sektor-perikanan',[SektorPerikananController::class,'store_sektor_perikanan'])->name('simpan.sektor.perikanan');
    Route::post('/update/{id}/sektor-perikanan',[SektorPerikananController::class,'update_sektor_perikanan'])->name('update.sektor.perikanan');
    Route::get('/hapus/{id}/sektor-perikanan',[SektorPerikananController::class,'destroy_sektor_perikanan'])->name('hapus.sektor.perikanan');
    //Route Peternakan
    Route::get('/index/sektor-peternakan',[SektorPeternakanController::class,'index'])->name('index.sektor.peternakan');
    Route::post('/tambah/sektor-peternakan',[SektorPeternakanController::class,'store_sektor_peternakan'])->name('simpan.sektor.peternakan');
    Route::post('/update/{id}/sektor-peternakan',[SektorPeternakanController::class,'update_sektor_peternakan'])->name('update.sektor.peternakan');
    Route::get('/hapus/{id}/sektor-peternakan',[SektorPeternakanController::class,'destroy_sektor_peternakan'])->name('hapus.sektor.peternakan');
  
    Route::get('/profil',[ProfilController::class,'index'])->name('index.profil');
    Route::post('/profil',[ProfilController::class,'update_profil'])->name('update.profil');
    Route::post('/password',[ProfilController::class,'update_password'])->name('update.password');
    Route::get('/periode', function (Request $request) {
        Periode::where('active','1')->update(['active'=>'0']);
        Periode::where('id',$request->periode)->update(['active'=>'1']);
        return back();
    })->name('update.periode.dashboard');
});
