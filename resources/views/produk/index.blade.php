@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded shadow">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-3xl font-extrabold text-purple-100 mb-8 text-center drop-shadow-lg">Produk Kami</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($produk as $item)
            <div class="bg-white/80 p-4 shadow-xl rounded-xl transform transition duration-300 hover:scale-105">
                <div class="relative">
                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                        alt="{{ $item->nama_produk }}" 
                        class="w-full h-64 object-cover rounded-lg">
                    <span class="absolute top-2 right-2 bg-purple-700 text-white text-xs px-3 py-1 rounded-full shadow-md">
                        Stok: {{ $item->stok }}
                    </span>
                </div>

                <div class="flex flex-col gap-2 mt-4">
                    <a href="{{ route('produk.show', $item->id) }}" 
                        class="block text-center bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-600 transition">
                        Lihat Detail
                    </a>

                    <form action="{{ route('keranjang.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $item->id }}">

                        <div class="flex flex-col sm:flex-row gap-2 items-center mt-2">
                            <input type="number" name="qty" min="1" max="{{ $item->stok }}" value="1" 
                                class="sm:w-1/2 w-full border border-purple-300 bg-purple-50 text-purple-900 px-3 py-2 rounded-md 
                                       focus:outline-none focus:ring-2 focus:ring-purple-500 font-semibold text-center"
                                @if ($item->stok == 0) disabled @endif>

                            <button type="submit" 
                                class="w-full sm:w-1/2 bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-600 transition 
                                       @if ($item->stok == 0) opacity-50 cursor-not-allowed @endif" 
                                @if ($item->stok == 0) disabled @endif>
                                Tambah ke Keranjang
                            </button>
                        </div>

                        @if ($item->stok == 0)
                            <p class="text-red-600 text-sm mt-1 text-center">Stok habis</p>
                        @endif
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
