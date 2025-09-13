<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Pastikan user adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized Access');
        }

        // Mengambil data total produk, pesanan, pengguna
        $totalProduk = Produk::count();
        $totalPesanan = Pesanan::count();
        $totalPengguna = User::where('role', 'pelanggan')->count();

        // Ambil data laporan keuangan untuk hari ini
        $today = Carbon::today()->toDateString(); // Mengambil tanggal hari ini

        // Ambil data pemasukan dari pesanan yang selesai
        $pesananSelesai = Pesanan::whereDate('updated_at', $today)
            ->where('status', 'selesai')
            ->get();

        // Hitung total pemasukan
        $pemasukan = $pesananSelesai->sum('total');

        // Kirim data ke view (hanya pemasukan)
        return view('dashboard.admin', compact(
            'totalProduk', 'totalPesanan', 'totalPengguna', 'pemasukan'
        ));
    }
}
