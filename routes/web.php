<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Auth::routes();

Route::get('/login', 'LoginController@getLogin')->middleware('guest');
Route::post('/login', 'LoginController@postLogin')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('auth:admin')->group(function () {  
    Route::get('/', function(){return view('pages.dashboard');})->name('admin.dashboard');   
    Route::livewire('/spp', 'admin.spp-livewire')->name('admin.spp');
    Route::livewire('/kelas', 'admin.kelas-livewire')->name('admin.kelas');
    Route::livewire('/siswa', 'admin.siswa-livewire')->name('admin.siswa');
    Route::livewire('/petugas', 'admin.petugas-livewire')->name('admin.petugas');
    Route::livewire('/pembayaran-spp', 'admin.pembayaran-spp-livewire')->name('admin.pembayaran-spp');
});

Route::prefix('petugas')->middleware('auth:petugas')->group(function (){
    Route::livewire('/', 'petugas.dashboard-livewire')->name('petugas.dashboard');
    Route::livewire('/pembayaran-spp', 'petugas.pembayaran-spp-livewire')->name('petugas.pembayaran-spp');
});