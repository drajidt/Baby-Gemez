@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
<div class="container mx-auto text-center">
    <h2 class="text-3xl font-bold text-white mb-6">Dashboard Pelanggan</h2>

    <div class="grid grid-cols-3 gap-6">
        <!-- Keranjang -->
        <div class="bg-white/10 p-6 rounded-lg border border-white/20 text-white">
            <h3 class="text-lg font-bold">Keranjang</h3>
            <p>{{ $jumlah_keranjang }} Item</p>
            <a href="{{ route('user.keranjang') }}" class="mt-3 inline-block bg-blue-500 px-4 py-2 rounded-lg">Lihat</a>
        </div>

        <!-- Riwayat Pesanan -->
        <div class="bg-white/10 p-6 rounded-lg border border-white/20 text-white">
            <h3 class="text-lg font-bold">Riwayat Pesanan</h3>
            <p>{{ $jumlah_pesanan }} Pesanan</p>
            <a href="{{ route('user.riwayat') }}" class="mt-3 inline-block bg-yellow-500 px-4 py-2 rounded-lg">Lihat</a>
        </div>

        <!-- Transaksi -->
        <div class="bg-white/10 p-6 rounded-lg border border-white/20 text-white">
            <h3 class="text-lg font-bold">Transaksi</h3>
            <p>Total: Rp{{ number_format($total_belanja, 0, ',', '.') }}</p>
            <a href="{{ route('user.transaksi') }}" class="mt-3 inline-block bg-red-500 px-4 py-2 rounded-lg">Lihat</a>
        </div>
    </div>
</div>
@endsection
