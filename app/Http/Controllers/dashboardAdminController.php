<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Spp;
use App\PembayaranSpp;

class dashboardAdminController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranSpp::all()->sum('jumlah_bayar');
        $nominal = PembayaranSpp::with('siswa')->get();
        return view('livewire.admin.dashboard', [
            'siswa' => Siswa::all()->count()
        ]);
    }
}