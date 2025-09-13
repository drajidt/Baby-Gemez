<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // Ambil semua produk dari database
        return view('produk.index', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }
    public function tambahKeranjang($id)
    {
        // Simulasi tambah ke keranjang
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }
}

