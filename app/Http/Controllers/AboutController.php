<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::all();
        return view('tentang-kami', compact('cabangs'));
    }
}
