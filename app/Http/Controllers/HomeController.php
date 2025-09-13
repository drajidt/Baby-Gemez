<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Cabang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->paginate(4);
        return view('home', compact('produk'));
    }

    public function cabang()
    {
        $cabangs = Cabang::all(); // Ambil semua data cabang
        dd($cabangs);
        return view('tentang', compact('cabangs'));
    }
}
