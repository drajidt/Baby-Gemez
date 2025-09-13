@extends('layouts.karyawan')

@section('title', 'Dashboard Karyawan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Laporan Harian -->
    <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200 hover:shadow-lg transition">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Laporan Harian</h3>
        <p class="text-sm text-gray-500">Lihat dan cetak laporan keuangan harian.</p>
        <a href="{{ route('karyawan.laporan.harian') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition">
            Lihat
        </a>
    </div>

    <!-- Kelola Pesanan -->
    <div class="p-6 bg-white shadow-md rounded-lg border border-gray-200 hover:shadow-lg transition">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Kelola Pesanan</h3>
        <p class="text-sm text-gray-500">Cek dan update status pesanan pelanggan.</p>
        <a href="{{ route('karyawan.pesanan') }}" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Lihat
        </a>
    </div>

</div>
@endsection
