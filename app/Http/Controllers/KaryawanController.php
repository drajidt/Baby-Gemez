<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        // Middleware auth dan role:karyawan dipastikan hanya karyawan yang bisa akses
        $this->middleware('auth');
    }

    public function index()
    {
        // Cek role secara manual di dalam method
        if (Auth::check() && Auth::user()->role == 'karyawan') {
            // Jika role user adalah admin, tampilkan halaman admin
            return view('dashboard.karyawan');
        }

        // Jika bukan admin, redirect ke halaman lain atau berikan pesan error
        return redirect('/')->with('error', 'Unauthorized Access');
    }
}
