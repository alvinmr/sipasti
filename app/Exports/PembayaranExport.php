<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\PembayaranSpp;

class PembayaranExport implements FromView
{
    public function view(): View
    {
        return view('pdf.pembayaran', [
            'pembayaran_spps' => PembayaranSpp::all(),
            'total' => PembayaranSpp::all()->sum('jumlah_bayar')
        ]);
    }
}