@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Tentang Kami --}}
    <div class="bg-gradient-to-br from-purple-100 to-white p-8 rounded-2xl shadow-xl mb-12">
        <h1 class="text-3xl font-extrabold text-purple-700 mb-6">Tentang Kami</h1>
        
        <p class="text-gray-700 leading-relaxed mb-8 text-justify">
            <span class="font-semibold">Baby Gemez</span> adalah perusahaan yang menyediakan produk bayi berkualitas tinggi untuk memenuhi kebutuhan si kecil. Kami berkomitmen untuk memberikan produk terbaik dengan harga yang terjangkau dan aman dikonsumsi.
        </p>

        <!-- Kandungan Gizi -->
        <h2 class="text-2xl font-bold text-purple-700 mb-4">Kandungan Gizi Produk</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Bubur -->
            <div class="bg-white border border-purple-200 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <h3 class="text-xl font-semibold text-purple-600 mb-2">🍚 Bubur</h3>
                <p class="text-gray-600 mb-3">
                    Mengandung karbohidrat, protein, serat, dan vitamin yang membantu pertumbuhan bayi.
                </p>
                <ul class="list-disc pl-5 text-gray-700 space-y-1">
                    <li>Karbohidrat: 20g</li>
                    <li>Protein: 5g</li>
                    <li>Serat: 3g</li>
                    <li>Vitamin A, C, D, dan K</li>
                </ul>
            </div>

            <!-- Puding -->
            <div class="bg-white border border-purple-200 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <h3 class="text-xl font-semibold text-purple-600 mb-2">🍮 Puding</h3>
                <p class="text-gray-600 mb-3">
                    Sumber kalsium dan vitamin untuk kesehatan tulang serta pencernaan bayi.
                </p>
                <ul class="list-disc pl-5 text-gray-700 space-y-1">
                    <li>Kalsium: 150mg</li>
                    <li>Vitamin D: 20 IU</li>
                    <li>Serat: 2g</li>
                    <li>Antioksidan alami</li>
                </ul>
            </div>

            <!-- Sop -->
            <div class="bg-white border border-purple-200 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                <h3 class="text-xl font-semibold text-purple-600 mb-2">🍲 Sop</h3>
                <p class="text-gray-600 mb-3">
                    Kaya akan protein, zat besi, dan mineral untuk mendukung sistem imun bayi.
                </p>
                <ul class="list-disc pl-5 text-gray-700 space-y-1">
                    <li>Protein: 6g</li>
                    <li>Zat Besi: 2mg</li>
                    <li>Vitamin B12 dan B6</li>
                    <li>Omega-3 untuk perkembangan otak</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Cabang Kami --}}
    <div>
        <h1 class="text-3xl font-bold mb-6 text-white">Cabang Kami</h1>

        @if($cabangs->isEmpty())
            <p class="text-white">Belum ada cabang yang tersedia.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($cabangs as $cabang)
                    <div class="bg-purple-700 p-5 rounded-xl shadow-md text-white hover:bg-purple-800 transition">
                        <img src="{{ asset('storage/' . $cabang->gambar) }}" class="w-full h-40 object-cover rounded-lg mb-3" alt="{{ $cabang->nama_cabang }}">
                        <h2 class="text-xl font-semibold">{{ $cabang->nama_cabang }}</h2>
                        <p class="text-sm">{{ $cabang->alamat }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
