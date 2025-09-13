<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        // Ambil keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Validasi isi keranjang agar selalu berupa array
        if (!is_array($keranjang)) {
            $keranjang = [];
            session()->forget('keranjang');
        }

        return view('keranjang.index', compact('keranjang'));
    }

    public function store(Request $request)
    {
        // Validasi input untuk produk dan kuantitas
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'qty' => 'nullable|integer|min:1'
        ]);

        $produkId = $request->produk_id;
        $qty = $request->qty ?? 1;

        $produk = Produk::findOrFail($produkId);

        // Cek stok produk (stok tidak dikurangi di sini, tapi dicek untuk ketersediaan)
        if ($produk->stok < $qty) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        // Ambil keranjang dari session
        $keranjang = session()->get('keranjang', []);

        // Tambah atau update item keranjang
        if (isset($keranjang[$produkId])) {
            if ($produk->stok < $keranjang[$produkId]['jumlah'] + $qty) {
                return redirect()->back()->with('error', 'Stok produk tidak cukup untuk menambahkan jumlah tersebut.');
            }
            $keranjang[$produkId]['jumlah'] += $qty;
        } else {
            $keranjang[$produkId] = [
                'id' => $produk->id,
                'nama' => $produk->nama_produk,
                'harga' => $produk->harga,
                'jumlah' => $qty,
                'gambar' => $produk->gambar,
            ];
        }

        // **Jangan kurangi stok di sini!**

        // Simpan keranjang ke session
        session()->put('keranjang', $keranjang);
        if (Auth::check()) {
            session()->put('keranjang_' . Auth::id(), $keranjang);
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        // Ambil keranjang dari session
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            // **Jangan kembalikan stok karena stok tidak dikurangi saat tambah ke keranjang**

            // Hapus item dari keranjang
            unset($keranjang[$id]);

            // Simpan kembali ke session
            session()->put('keranjang', $keranjang);
            if (Auth::check()) {
                session()->put('keranjang_' . Auth::id(), $keranjang);
            }
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
