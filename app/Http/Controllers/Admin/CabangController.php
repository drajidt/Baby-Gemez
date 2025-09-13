<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class CabangController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::all();
        return view('admin.cabang.index', compact('cabangs'));
    }

    public function create()
    {
        return view('admin.cabang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('cabangs', 'public');
        }

        Cabang::create([
            'nama_cabang' => $request->nama_cabang,
            'alamat' => $request->alamat,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.cabang.index')->with('success', 'Cabang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('admin.cabang.edit', compact('cabang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $cabang = Cabang::findOrFail($id);
        $gambarPath = $cabang->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambarPath) {
                Storage::delete('public/' . $gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('cabangs', 'public');
        }

        $cabang->update([
            'nama_cabang' => $request->nama_cabang,
            'alamat' => $request->alamat,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.cabang.index')->with('success', 'Cabang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cabang = Cabang::findOrFail($id);
        if ($cabang->gambar) {
            Storage::delete('public/' . $cabang->gambar);
        }
        $cabang->delete();

        return redirect()->route('admin.cabang.index')->with('success', 'Cabang berhasil dihapus');
    }


}


