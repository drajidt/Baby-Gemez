@extends('layouts.karyawan')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Ubah Status Pesanan</h2>

    <form action="{{ route('karyawan.pesanan.update', $pesanan->id) }}" method="POST"
          class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Status:</label>
            <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                <option value="menunggu" {{ $pesanan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diproses" {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
            <a href="{{ route('karyawan.pesanan') }}"
               class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
