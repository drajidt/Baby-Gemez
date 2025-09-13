@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Detail Pesanan</h2>

    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <p><strong>Cabang:</strong> {{ $pesanan->cabang }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
        <p><strong>Status:</strong> {{ $pesanan->status }}</p>
        <p><strong>Tanggal:</strong> {{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</p>


    </div>

    <div class="mb-4">
        <h3 class="font-semibold mb-2">Daftar Produk:</h3>
        <ul class="list-disc ml-6 text-black">
            @foreach ($pesanan->produk as $item)
                <li>{{ $item->nama_produk }} - {{ $item->pivot->jumlah }} pcs</li>
            @endforeach
        </ul>
    </div>

    <div class="text-right text-lg font-bold text-purple-800">
        Total: Rp {{ number_format($pesanan->total, 0, ',', '.') }}
    </div>

    <div class="mt-6">
        <a href="{{ route('pesanan.index') }}"
           class="inline-block bg-purple-700 text-white px-5 py-2 rounded-md hover:bg-purple-600 transition">
            Kembali ke Daftar Pesanan
        </a>
    </div>
</div>

{{-- Tambahkan Auto Redirect --}}
<script>
    setTimeout(function () {
        window.location.href = "{{ route('pesanan.index') }}";
    }, 5000);
</script>
@endsection