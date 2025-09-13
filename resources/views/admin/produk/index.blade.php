@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Kelola Produk</h2>
        <a href="{{ route('admin.produk.create') }}" class="bg-purple-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-purple-500 transition duration-300">
            Tambah Produk
        </a>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Product Table -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-purple-100 text-gray-700">
                    <th class="px-6 py-4 text-left font-semibold">Gambar</th>
                    <th class="px-6 py-4 text-left font-semibold">Nama</th>
                    <th class="px-6 py-4 text-left font-semibold">Harga</th>
                    <th class="px-6 py-4 text-left font-semibold">Stok</th>
                    <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr class="border-t">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="w-16 h-16 object-cover rounded-full border" alt="{{ $item->nama_produk }}">
                        </td>
                        <td class="px-6 py-4 text-gray-800">{{ $item->nama_produk }}</td>
                        <td class="px-6 py-4 text-gray-800">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $item->stok }}</td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('admin.produk.edit', $item->id) }}" class="text-blue-600 hover:underline transition duration-200">Edit</a>
                            <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline transition duration-200">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
