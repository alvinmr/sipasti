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

Route::middleware('guest')->group(function () {
    Route::get('/', 'LoginController@getLogin')->name('home');
    Route::post('/login', 'LoginController@postLogin')->name('login');
    Route::get('/login-siswa', 'LoginController@getLoginSiswa');
    Route::post('/login-siswa', 'LoginController@postLoginSiswa')->name('login-siswa');
});
Route::get('/logout', 'LoginController@logout')->name('logout');



Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/', 'dashboardAdminController@index')->name('admin.dashboard');
    Route::livewire('/spp', 'admin.spp-livewire')->name('admin.spp');
    Route::livewire('/kelas', 'admin.kelas-livewire')->name('admin.kelas');
    Route::livewire('/siswa', 'admin.siswa-livewire')->name('admin.siswa');
    Route::livewire('/petugas', 'admin.petugas-livewire')->name('admin.petugas');
    Route::livewire('/pembayaran-spp', 'admin.pembayaran-spp-livewire')->name('admin.pembayaran-spp');
    Route::livewire('/history-spp', 'admin.history-spp-livewire')->name('admin.history-spp');
    Route::get('/exportpdf', 'AdminToPdf@export_pdf')->name('exportpdf');
});

Route::prefix('petugas')->middleware('auth:petugas')->group(function () {
    Route::livewire('/', 'petugas.dashboard-livewire')->name('petugas.dashboard');
    Route::livewire('/pembayaran-spp', 'petugas.pembayaran-spp-livewire')->name('petugas.pembayaran-spp');
    Route::livewire('/history-spp', 'petugas.history-spp-livewire')->name('petugas.history-spp');
});

Route::prefix('siswa')->middleware('auth:siswa')->group(function () {
    Route::livewire('/', 'siswa.dashboard-livewire')->name('siswa.dashboard');
    Route::livewire('/history-spp', 'siswa.history-spp-livewire')->name('siswa.history-spp');
});