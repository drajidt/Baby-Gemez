@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12">
    <div class="container mx-auto">
        
        <!-- Banner -->
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner rounded-lg shadow-lg">
                <div class="carousel-item active">
                    <img src="{{ asset('images/baner.png') }}" class="d-block w-100 h-[400px] object-cover" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner food.jpg') }}" class="d-block w-100 h-[400px] object-cover" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner foodd.jpg') }}" class="d-block w-100 h-[400px] object-cover" alt="Banner 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Kategori Produk -->
        <div class="text-center mt-12 text-white">
            <h2 class="text-2xl font-bold mb-6 text-white-800">Kategori</h2>
            <div class="flex justify-center gap-6">
                @php
                    $categories = [
                        ['image' => 'bubur.png', 'name' => 'Bubur Bayi'],
                        ['image' => 'sop.png', 'name' => 'Sop Bayi'],
                        ['image' => 'pudding.png', 'name' => 'Pudding Bayi']
                    ];
                @endphp

                @foreach ($categories as $category)
                    <div class="bg-white p-5 shadow-lg rounded-lg text-center w-44 transition duration-300 transform hover:scale-110">
                        <img src="{{ asset('images/' . $category['image']) }}" alt="{{ $category['name'] }}" class="w-full h-28 object-cover rounded-lg mb-3">
                        <p class="font-semibold text-gray-700">{{ $category['name'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Produk -->
        <div class="mt-12 text-white">
            <h2 class="text-2xl font-bold mb-6 text-center text-white-800">Produk Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($produk as $item)
                    <div class="bg-white/80 p-4 shadow-xl rounded-xl transform transition duration-300 hover:scale-105">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $item->gambar) }}" 
                                alt="Produk Gambar" 
                                class="w-full h-64 object-cover rounded-lg">
                            <span class="absolute top-2 right-2 bg-purple-700 text-white text-xs px-3 py-1 rounded-full shadow-md">
                                Stok: {{ $item->stok }}
                            </span>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('produk.show', $item->id) }}" 
                                class="block text-center bg-purple-700 text-white py-2 rounded-lg hover:bg-purple-600 transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $produk->links('pagination::tailwind') }}
            </div>
        </div>

    </div>
</div>

<script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
@endsection
