<?php

// app/Http/Controllers/CabangController.php

namespace App\Http\Controllers;

use App\Models\Cabang; // Pastikan model Cabang sudah di-import

class CabangController extends Controller
{
    public function index()
    {
        // Ambil semua data cabang dari database
        $cabangs = Cabang::all();  // Ini akan mengambil semua cabang

        // Kirim data cabang ke tampilan
        return view('admin.cabang.index', compact('cabangs')); // Sekarang variabel 'cabangs' ada di tampilan
    }
    public function cabang()
    {
        $cabangs = Cabang::all(); // Ambil semua data cabang
        dd($cabangs);
        return view('tentang', compact('cabangs'));
    }
}

