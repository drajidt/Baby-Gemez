@extends('layouts.admin')

@section('title', 'Kelola Cabang')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-purple-800">Kelola Cabang</h1>
        <a href="{{ route('admin.cabang.create') }}" 
           class="flex items-center gap-2 bg-purple-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-purple-500 hover:shadow-lg transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 4v16m8-8H4" />
            </svg>
            Tambah Cabang
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($cabangs as $cabang)
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300">
                <img src="{{ asset('storage/' . $cabang->gambar) }}" 
                     alt="{{ $cabang->nama_cabang }}" 
                     class="w-full h-40 object-cover">
                <div class="p-5">
                    <h2 class="text-lg font-bold text-purple-800">{{ $cabang->nama_cabang }}</h2>
                    <p class="text-gray-600 mt-1">{{ $cabang->alamat }}</p>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('admin.cabang.edit', $cabang->id) }}" 
                           class="text-sm px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-400 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.cabang.destroy', $cabang->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus cabang ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-sm px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
