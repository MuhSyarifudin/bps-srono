<?php

use App\Http\Controllers\DeskripsiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SektorPertanianController;
use App\Livewire\ChartLoader;
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
Route::get('/', [ChartLoader::class,'show_chart'])->name('tampilkan.per.periode');

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
    Route::get('/edit/sektor-pertanian',[SektorPertanianController::class,'tambah_sektor_pertanian'])->name('tambah.sektor.pertanian');
    Route::post('/edit/sektor-pertanian',[SektorPertanianController::class,'store_sektor_pertanian'])->name('simpan.sektor.pertanian');
});
