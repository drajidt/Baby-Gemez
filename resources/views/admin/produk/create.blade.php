@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Produk Baru</h2>

        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Nama Produk -->
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama_produk"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    required autocomplete="off">
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    ></textarea>
            </div>

            <!-- Harga dan Stok -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-lg font-medium text-gray-700">Harga</label>
                    <input type="number" name="harga"
                        class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                        required>
                </div>
                <div>
                    <label class="block mb-2 text-lg font-medium text-gray-700">Stok</label>
                    <input type="number" name="stok"
                        class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                        required>
                </div>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-700">Kategori Produk</label>
                <select name="kategori"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400"
                    required>
                    <option value="">Pilih Kategori</option>
                    <option value="Sop">Sop</option>
                    <option value="Bubur">Bubur</option>
                    <option value="Puding">Puding</option>
                </select>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="gambar"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>

            <!-- Tombol Submit -->
            <div class="text-right">
                <button type="submit"
                    class="bg-purple-600 hover:bg-purple-500 text-white font-semibold px-8 py-3 rounded-lg shadow-md transition-all duration-300">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
