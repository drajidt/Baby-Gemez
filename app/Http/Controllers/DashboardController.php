<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function pemilik()
    {
        return view('dashboard.admin', [
            'jumlah_karyawan' => Karyawan::count(),
            'jumlah_produk' => Produk::count(),
            'total_pemasukan' => Transaksi::sum('total_bayar'),
        ]);
    }

    public function karyawan()
    {
        return view('dashboard.karyawan', [
            'jumlah_produk' => Produk::count(),
            'jumlah_pesanan_baru' => Pesanan::where('status', 'Menunggu')->count(),
            'jumlah_notifikasi' => Pesanan::where('status', 'Selesai')->count(),
        ]);
    }

    public function user()
    {
        return view('dashboard.user', [
            'jumlah_keranjang' => Keranjang::where('id_user', auth()->id())->count(),
            'jumlah_pesanan' => Pesanan::where('id_user', auth()->id())->count(),
            'total_belanja' => Transaksi::where('id_user', auth()->id())->sum('total_bayar'),
        ]);
    }
}
