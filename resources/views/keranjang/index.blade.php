@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-purple-50 shadow-lg rounded-xl">
    <h2 class="text-3xl font-bold mb-6 text-purple-800">Keranjang Belanja</h2>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- Jika keranjang kosong --}}
    @if (empty($keranjang))
        <p class="text-gray-600 italic">Keranjang belanja kamu masih kosong 😔</p>
    @else
        {{-- Daftar Produk di Keranjang --}}
        <ul class="divide-y divide-gray-300">
            @php $total = 0; @endphp
            @foreach ($keranjang as $id => $item)
                @php
                    $subtotal = $item['harga'] * $item['jumlah'];
                    $total += $subtotal;
                @endphp
                <li class="py-5 flex items-center gap-5 bg-white px-4 rounded-lg shadow-sm mb-3">
                    {{-- Gambar Produk --}}
                    <img src="{{ asset('storage/' . $item['gambar']) }}"
                         alt="{{ $item['nama'] }}"
                         class="w-24 h-24 object-cover rounded-lg border border-gray-200">

                    {{-- Info Produk --}}
                    <div class="flex-1">
                        <p class="font-semibold text-lg text-gray-800">{{ $item['nama'] }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $item['jumlah'] }} pcs × Rp {{ number_format($item['harga'], 0, ',', '.') }}
                        </p>
                        <p class="mt-1 font-semibold text-purple-700">
                            Subtotal: Rp {{ number_format($subtotal, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('keranjang.destroy', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-600 hover:text-red-800 hover:underline text-sm font-medium">
                            Hapus
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>

        {{-- Total Harga --}}
        <div class="mt-6 border-t pt-4 text-right text-xl font-bold text-purple-900">
            Total: Rp {{ number_format($total, 0, ',', '.') }}
        </div>

        {{-- Tombol Checkout --}}
        <form action="{{ route('checkout.index') }}" method="GET" class="mt-4 text-right">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md text-sm font-semibold shadow-sm transition">
                Checkout
            </button>
        </form>
    @endif

    {{-- Tombol Lanjut Belanja --}}
    <div class="mt-6 text-right">
        <a href="{{ route('produk.index') }}"
           class="bg-purple-700 hover:bg-purple-800 text-white px-6 py-2 rounded-md text-sm font-semibold shadow-sm transition">
            Lanjut Belanja
        </a>
    </div>
</div>
@endsection
