@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-purple-50 shadow-lg rounded-xl">
    <h2 class="text-3xl font-bold mb-6 text-purple-800">Konfirmasi Pesanan</h2>

    <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <h3 class="font-semibold text-lg mb-2">Produk Dipesan:</h3>
            <ul class="list-disc ml-6">
                @foreach ($keranjang as $item)
                    <li>{{ $item['nama'] }} - {{ $item['jumlah'] }} pcs</li>
                @endforeach
            </ul>
        </div>

        <div>
            <label class="block">Pilih Cabang:</label>
            <select name="cabang" required class="w-full border p-2 rounded">
                <option value="Pemayahan">Pemayahan</option>
                <option value="Celeng">Celeng</option>
                <option value="Bangkir">Bangkir</option>
            </select>
        </div>

        <div>
            <label class="block">Metode Pembayaran:</label>
            <div class="flex gap-4">
                <label><input type="radio" name="metode_pembayaran" value="COD" required> COD</label>
                <label><input type="radio" name="metode_pembayaran" value="Online" required> Online</label>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-purple-700 text-white px-6 py-2 rounded">Konfirmasi</button>
        </div>
    </form>
</div>
@endsection
