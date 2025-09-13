@extends('layouts.app')

@section('content')
<div class="bg-white p-6 shadow rounded-lg max-w-xl mx-auto text-black">
    <h2 class="text-xl font-bold mb-4 text-black">Detail Pesanan</h2>

    <p><strong>ID Pesanan:</strong> {{ $pesanan->id_pesanan }}</p>
    <p><strong>Cabang:</strong> {{ $pesanan->cabang }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ strtoupper($pesanan->metode_pembayaran) }}</p>

    <h4 class="mt-4 font-semibold">Produk Dipesan:</h4>
    <ul class="text-sm">
        @foreach (json_decode($pesanan->keranjang, true) as $item)
            <li>• {{ $item['nama_produk'] }} ({{ $item['jumlah'] }} pcs)  {{ number_format($subtotal, 0, ',', '.') }}</li>
        @endforeach
    </ul>

    <a href="{{ route('pesanan.index') }}" class="inline-block mt-6 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">
        Lihat Daftar Pesanan
    </a>
</div>
@endsection
