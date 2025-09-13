@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Daftar Pesanan Anda</h2>

    @if (session('success'))
        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    @if ($pesanans->isEmpty())
        <p class="text-gray-600">Belum ada pesanan aktif saat ini.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-purple-100">
                    <tr>
                        <th class="p-2 text-left">Nama Produk</th>
                        <th class="p-2 text-left">Cabang</th>
                        <th class="p-2 text-left">Total</th>
                        <th class="p-2 text-left">Metode</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">Tanggal</th>
                        <th class="p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanans as $pesanan)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-2">
                                @foreach ($pesanan->produk as $produk)
                                    <div>{{ $produk->nama_produk }}</div>
                                @endforeach
                            </td>
                            <td class="p-2">{{ $pesanan->cabang }}</td>
                            <td class="p-2">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</td>
                            <td class="p-2">{{ $pesanan->metode_pembayaran }}</td>
                            <td class="p-2 capitalize">{{ $pesanan->status }}</td>
                            <td class="p-2">{{ $pesanan->created_at->format('d M Y') }}</td>
                            <td class="p-2">
                                <a href="{{ route('pesanan.show', $pesanan->id) }}" class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded text-sm">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $pesanans->links() }}
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row sm:justify-between gap-4">
        <a href="{{ route('produk.index') }}"
           class="inline-block bg-purple-700 text-white px-5 py-2 rounded-md hover:bg-purple-600 transition">
            Kembali ke Produk
        </a>
        <a href="{{ route('pesanan.riwayat') }}"
           class="inline-block bg-gray-800 text-white px-5 py-2 rounded-md hover:bg-gray-700 transition">
            Lihat Riwayat Pesanan
        </a>
    </div>
</div>
@endsection
