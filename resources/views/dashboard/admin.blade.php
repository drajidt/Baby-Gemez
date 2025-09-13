@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <!-- Dashboard Header -->
    <div class="flex justify-between items-center mb-10">
        <div>
            <h2 class="text-4xl font-bold text-gray-800">Dashboard Admin</h2>
            <p class="text-lg text-gray-500 mt-2">Selamat datang kembali, {{ auth()->user()->name }} 👋</p>
        </div>
        <!-- Dropdown Menu for Admin -->
        <div class="relative">
            <button id="dropdown-button" class="flex items-center gap-2 bg-purple-600 hover:bg-purple-500 text-white py-2 px-5 rounded-lg focus:outline-none shadow-md transition">
                Menu
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdown-menu" class="absolute right-0 mt-2 w-40 hidden bg-white rounded-lg shadow-lg overflow-hidden z-10">
                <form method="POST" action="{{ route('logout') }} ">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-gradient-to-r from-purple-500 to-purple-700 p-6 rounded-xl shadow-lg text-white">
            <h3 class="text-lg mb-2">Total Produk</h3>
            <p class="text-4xl font-bold">{{ $totalProduk }}</p>
        </div>
        <div class="bg-gradient-to-r from-green-400 to-green-600 p-6 rounded-xl shadow-lg text-white">
            <h3 class="text-lg mb-2">Total Pesanan</h3>
            <p class="text-4xl font-bold">{{ $totalPesanan }}</p>
        </div>
        <div class="bg-gradient-to-r from-blue-400 to-blue-600 p-6 rounded-xl shadow-lg text-white">
            <h3 class="text-lg mb-2">Total Pengguna</h3>
            <p class="text-4xl font-bold">{{ $totalPengguna }}</p>
        </div>
    </div>

    <!-- Laporan Keuangan Harian -->
    <div class="mb-10">
        <h3 class="text-2xl font-bold text-gray-700 mb-4">Laporan Keuangan Harian</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white p-6 rounded-xl shadow-lg">
                <h4 class="text-lg mb-2">Total Pemasukan Hari Ini</h4>
                <p class="text-3xl font-bold">Rp {{ number_format($pemasukan, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });
</script>
@endsection
