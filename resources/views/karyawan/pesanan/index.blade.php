@extends('layouts.karyawan')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-6">Kelola Pesanan</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Nama Pelanggan</th>
                <th class="border px-4 py-2">Total</th>
                <th class="border px-4 py-2">Cabang</th>
                <th class="border px-4 py-2">Metode</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $pesanan->user->name }}</td>
                <td class="border px-4 py-2">Rp{{ number_format($pesanan->total, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">{{ $pesanan->cabang }}</td>
                <td class="border px-4 py-2">{{ $pesanan->metode_pembayaran }}</td>
                <td class="border px-4 py-2">
                    {{ $pesanan->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                </td>
                <td class="border px-4 py-2 capitalize">{{ $pesanan->status }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('karyawan.pesanan.edit', $pesanan->id) }}"
                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        Edit
                    </a>
                    <form action="{{ route('karyawan.pesanan.destroy', $pesanan->id) }}" method="POST" class="inline-block"
                          onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pesanans->links() }}
    </div>
</div>
@endsection
