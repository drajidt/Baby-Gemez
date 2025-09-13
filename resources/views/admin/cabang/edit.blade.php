@extends('layouts.admin')

@section('title', 'Edit Cabang')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h1 class="text-2xl font-bold mb-4 text-purple-700">Edit Cabang</h1>

    <form action="{{ route('admin.cabang.update', $cabang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_cabang" class="block text-sm font-medium text-gray-700">Nama Cabang</label>
            <input type="text" name="nama_cabang" id="nama_cabang" value="{{ old('nama_cabang', $cabang->nama_cabang) }}" 
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" 
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500"
                      required>{{ old('alamat', $cabang->alamat) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
            @if ($cabang->gambar)
                <img src="{{ asset('storage/' . $cabang->gambar) }}" alt="Gambar Cabang" class="w-full h-40 object-cover mb-2 rounded">
            @endif
            <input type="file" name="gambar" id="gambar" 
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0 file:text-sm file:font-semibold
                          file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100" />
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.cabang.index') }}" class="mr-3 px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Batal</a>
            <button type="submit" class="px-5 py-2 bg-purple-600 text-white rounded hover:bg-purple-500 transition">Simpan</button>
        </div>
    </form>
</div>
@endsection
