<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Fungsi untuk menampilkan laporan harian
    public function harian(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();

        // Ambil pesanan selesai pada tanggal yang diminta
        $pesananSelesai = Pesanan::whereDate('updated_at', $tanggal)
            ->where('status', 'selesai')
            ->get();

        // Hitung pemasukan dan keuntungan
        $pemasukan = $pesananSelesai->sum('total');
        $keuntungan = $pemasukan; // Jika tidak ada pengeluaran, keuntungan = pemasukan

        return view('karyawan.laporan.harian', compact('tanggal', 'pemasukan', 'keuntungan'));
    }

    // Fungsi untuk mencetak laporan harian
    public function cetakHarian(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();

        // Ambil pesanan selesai pada tanggal yang diminta
        $pesananSelesai = Pesanan::whereDate('updated_at', $tanggal)
            ->where('status', 'selesai')
            ->get();

        // Hitung pemasukan dan keuntungan
        $pemasukan = $pesananSelesai->sum('total');
        $keuntungan = $pemasukan;

        // Generate PDF
        $pdf = PDF::loadView('karyawan.laporan.pdf', compact('tanggal', 'pemasukan', 'keuntungan'));
        return $pdf->download('laporan_harian_' . $tanggal . '.pdf');
    }
}
