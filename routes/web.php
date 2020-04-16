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

Route::get('/', function () {
    return view('pages.dashboard');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {       
    Route::livewire('/spp', 'spp.spp-livewire')->name('spp');
    Route::livewire('/kelas', 'kelas.kelas-livewire')->name('kelas');
    Route::livewire('/siswa', 'siswa-livewire')->name('siswa');
});