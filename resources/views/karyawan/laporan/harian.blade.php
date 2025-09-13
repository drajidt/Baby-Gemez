@extends('layouts.karyawan')

@section('title', 'Laporan Harian')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Laporan Harian</h2>

    <!-- Form untuk memilih tanggal -->
    <form action="{{ route('karyawan.laporan.harian') }}" method="GET" class="mb-6">
        <label for="tanggal" class="block text-gray-700 font-medium">Pilih Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ $tanggal ?? now()->toDateString() }}" class="mt-2 p-2 border border-gray-300 rounded">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mt-2">
            Tampilkan Laporan
        </button>
    </form>

    <!-- Tabel Laporan -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-purple-100">
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Pemasukan</th>
                <th class="px-4 py-2">Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2">{{ $tanggal }}</td>
                <td class="px-4 py-2">Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
                <td class="px-4 py-2">Rp {{ number_format($keuntungan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Link untuk mencetak laporan -->
    <a href="{{ route('karyawan.cetak.laporan.harian', ['tanggal' => $tanggal]) }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
        Cetak Laporan Harian
    </a>
</div>
@endsection
