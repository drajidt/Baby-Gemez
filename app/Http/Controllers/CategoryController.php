<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dari database
        $categories = Category::all();

        // Kirim ke view
        return view('home', compact('categories'));
    }
}
