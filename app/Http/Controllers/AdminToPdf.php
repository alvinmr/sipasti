<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PembayaranSpp;
use App\Exports\PembayaranExport;
use Excel;
use PDF;

class AdminToPdf extends Controller
{
    public function export_pdf()
    {
        // $bayar = ;
        $pdf = PDF::loadView('pdf.pembayaran', [
            'pembayaran_spps' => PembayaranSpp::all(),
            'total' => PembayaranSpp::all()->sum('jumlah_bayar')
        ]);
        return $pdf->stream();
    }

    public function export()
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }
}