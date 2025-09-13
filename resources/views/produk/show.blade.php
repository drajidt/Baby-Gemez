@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white shadow-md rounded-lg p-6">
        
        <!-- Gambar Produk -->
        <div>
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}"
                 class="w-full h-[400px] object-cover rounded-lg shadow-md">
        </div>

        <!-- Detail Produk -->
        <div>
            <h1 class="text-3xl font-bold text-purple-800 mb-2">{{ $produk->nama_produk }}</h1>

            <p class="text-gray-600 mb-4 leading-relaxed">{{ $produk->deskripsi }}</p>

            <p class="text-2xl font-bold text-purple-700 mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

            {{-- Kategori telah dihapus --}}
            <p class="text-sm text-gray-500 mb-4">Stok tersedia: <span class="font-semibold">{{ $produk->stok }}</span></p>

            <!-- Form Tambah ke Keranjang -->
            <form action="{{ route('keranjang.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                <label for="qty" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="number" name="qty" id="qty" min="1" max="{{ $produk->stok }}" value="1"
                    class="w-24 px-3 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    @if ($produk->stok == 0) disabled @endif>

                <button type="submit"
                    class="w-full bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-600 transition
                           @if ($produk->stok == 0) opacity-50 cursor-not-allowed @endif"
                    @if ($produk->stok == 0) disabled @endif>
                    Tambah ke Keranjang
                </button>

                @if ($produk->stok == 0)
                    <p class="text-red-600 text-sm text-center">Stok produk habis</p>
                @endif
            </form>

            <!-- Tombol Kembali -->
            <a href="{{ route('produk.index') }}"
               class="block mt-6 text-center text-purple-700 hover:underline text-sm">
               ← Kembali ke daftar produk
            </a>
        </div>
    </div>
</div>
@endsection
