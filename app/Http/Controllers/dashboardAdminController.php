<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use App\Siswa;
use App\PembayaranSpp;

class dashboardAdminController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranSpp::all()->sum('jumlah_bayar');
        $nominal = PembayaranSpp::with('siswa')->get();
        return view('livewire.admin.dashboard', [
            'siswa' => Siswa::all()->count(),
            'kelas' => Kelas::all()->count(),
            'pembayaran' => PembayaranSpp::all()->count()
        ]);
    }
}