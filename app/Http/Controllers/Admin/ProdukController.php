<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    // Menampilkan halaman form tambah produk
    public function create()
    {
        return view('admin.produk.create');
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input produk
        $data = $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        // Simpan produk ke database
        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan halaman edit produk
    public function edit(Produk $produk)
    {
        
        return view('admin.produk.edit', compact('produk'));
    }

    // Memperbarui produk yang sudah ada
    public function update(Request $request, Produk $produk)
    {
        // Validasi input
        $data = $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kategori' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Debug data sebelum proses update
        // dd($data);
        if (empty($data['kategori'])) {
            $data['kategori'] = $produk->kategori;
        }
        // Jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        // Perbarui data produk
        $produk->update($data);

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Produk $produk)
    {
        // Hapus gambar dari storage jika ada
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
