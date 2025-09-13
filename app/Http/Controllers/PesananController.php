<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PesananController extends Controller
{
    // --- Pelanggan ---

    public function index()
    {
        // Ambil pesanan user yang statusnya bukan 'selesai'
        // atau yang 'selesai' tapi belum lewat 1 hari sejak dibuat
        $pesanans = Pesanan::where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('status', '!=', 'selesai')
                      ->orWhere(function ($q) {
                          $q->where('status', 'selesai')
                            ->where('created_at', '>=', now()->subDay());
                      });
            })
            ->with('produk')
            ->latest()
            ->paginate(10);

        return view('pesanan.index', compact('pesanans'));
    }

    public function show($id)
    {
        $pesanan = Pesanan::where('user_id', auth()->id())
            ->with('produk')
            ->findOrFail($id);

        return view('pesanan.show', compact('pesanan'));
    }

    public function showByKode($kode_pesanan)
    {
        $pesanan = Pesanan::with('produk')
            ->where('kode_pesanan', $kode_pesanan)
            ->firstOrFail();

        return view('pesanan.show', compact('pesanan'));
    }

    public function riwayat()
    {
        // Ambil pesanan user yang sudah selesai (riwayat)
        $pesanans = Pesanan::where('user_id', auth()->id())
            ->where('status', 'selesai')
            ->with('produk')
            ->latest()
            ->get();

        return view('pesanan.riwayat', compact('pesanans'));
    }

    // --- Karyawan ---

    public function kelolaPesanan()
    {
        $pesanans = Pesanan::with('produk', 'user')->latest()->paginate(10);
        return view('karyawan.pesanan.index', compact('pesanans'));
    }

    public function editStatus($id)
    {
        $pesanan = Pesanan::with('produk', 'user')->findOrFail($id);
        return view('karyawan.pesanan.edit', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->route('karyawan.pesanan')->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Cegah hapus jika sudah selesai
        if ($pesanan->status === 'selesai') {
            return redirect()->back()->with('error', 'Pesanan yang sudah selesai tidak bisa dihapus.');
        }

        $pesanan->delete();

        return redirect()->route('karyawan.pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }

    // --- Laporan Harian ---

    public function harian(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();

        $pesananSelesai = Pesanan::whereDate('updated_at', $tanggal)
            ->where('status', 'selesai')
            ->get();

        $pemasukan = $pesananSelesai->sum('total');
        $keuntungan = $pemasukan;

        return view('karyawan.laporan.harian', compact('tanggal', 'pemasukan', 'keuntungan'));
    }

    public function cetakHarian(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? now()->toDateString();

        $pesananSelesai = Pesanan::whereDate('updated_at', $tanggal)
            ->where('status', 'selesai')
            ->get();

        $pemasukan = $pesananSelesai->sum('total');
        $keuntungan = $pemasukan;

        $pdf = PDF::loadView('karyawan.laporan.pdf', compact('tanggal', 'pemasukan', 'keuntungan'));

        return $pdf->download('laporan_harian_' . $tanggal . '.pdf');
    }
}
