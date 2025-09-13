@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Tambah Cabang</h2>

    <form action="{{ route('admin.cabang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Cabang</label>
            <input type="text" name="nama_cabang" id="nama" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Cabang</label>
            <input type="file" name="gambar" id="gambar" class="w-full border border-gray-300 p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
