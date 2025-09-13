<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function laporanHarian()
    {
        // Logika untuk mendapatkan data laporan harian
        $data = []; // Ganti dengan data yang sesuai

        return view('karyawan.laporan.harian', compact('data'));
    }

    public function cetakLaporanHarian()
    {
        // Logika untuk mendapatkan data laporan harian
        $data = []; // Ganti dengan data yang sesuai

        $pdf = PDF::loadView('karyawan.laporan.harian-pdf', compact('data'));
        return $pdf->download('laporan-harian.pdf');
    }
}
