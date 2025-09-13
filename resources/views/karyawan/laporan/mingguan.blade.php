@extends('layouts.karyawan')

@section('title', 'Laporan Mingguan')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Laporan Mingguan</h2>

    <!-- Form untuk memilih minggu -->
    <form action="{{ route('karyawan.laporan.mingguan') }}" method="GET" class="mb-6">
        <label for="minggu" class="block text-gray-700 font-medium">Pilih Minggu:</label>
        <input type="date" name="minggu" id="minggu" value="{{ $minggu ?? now()->subWeek()->toDateString() }}" class="mt-2 p-2 border border-gray-300 rounded">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded mt-2">
            Tampilkan Laporan
        </button>
    </form>

    <!-- Tabel Laporan -->
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-purple-100">
                <th class="px-4 py-2">Minggu</th>
                <th class="px-4 py-2">Pemasukan</th>
                <th class="px-4 py-2">Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-4 py-2">{{ $minggu }}</td>
                <td class="px-4 py-2">Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
                <td class="px-4 py-2">Rp {{ number_format($keuntungan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Link untuk mencetak laporan -->
    <a href="{{ route('karyawan.cetak.laporan.mingguan', ['minggu' => $minggu]) }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
        Cetak Laporan Mingguan
    </a>
</div>
@endsection
