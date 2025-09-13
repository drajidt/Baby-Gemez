@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 ">
    <h2 class="text-3xl font-bold text-center mb-8" style="color: white">Riwayat Pesanan</h2>

    @forelse ($pesanans as $pesanan)
        <div class="bg-white border border-gray-300 rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="text-gray-600 text-sm">Tanggal Pesanan:</p>
                    {{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</p>

                </div>
                <div>
                    <p class="text-gray-600 text-sm">Status:</p>
                    <span class="inline-block px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">Selesai</span>
                </div>
            </div>

            <div class="mb-4">
                <p><strong>Cabang:</strong> {{ $pesanan->cabang }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
            </div>

            <div class="mb-4">
                <h4 class="font-semibold mb-2">Produk Pesanan:</h4>
                <ul class="list-disc ml-6 text-gray-700">
                    @foreach ($pesanan->produk as $produk)
                        <li class="mb-1">
                            {{ $produk->nama_produk }} - {{ $produk->pivot->jumlah }} pcs 
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="text-right">
                <p class="text-xl font-bold text-purple-700">
                    Total: Rp {{ number_format($pesanan->total, 0, ',', '.') }}
                </p>
            </div>
        </div>
    @empty
        <div class="text-center mt-16">
            <img src="https://img.freepik.com/free-vector/empty-concept-illustration_114360-7411.jpg?w=826&t=st=1714150600~exp=1714151200~hmac=614c688d1c87f249b4f56b7c71ee6c77bd06e9c727f2f7a6fb957f7400a75cfc" 
                 alt="Empty" class="w-64 mx-auto mb-6">
            <p class="text-gray-500 text-lg">Belum ada pesanan yang selesai.</p>
        </div>
    @endforelse
</div>
@endsection
