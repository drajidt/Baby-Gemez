@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white shadow rounded text-center">
    <h2 class="text-2xl font-bold mb-4">Pembayaran Online</h2>

    <p class="mb-2"><strong>Kode Pesanan:</strong> {{ $pesanan->kode_pesanan }}</p>
    <p class="mb-4"><strong>Total:</strong> Rp{{ number_format($pesanan->total, 0, ',', '.') }}</p>

    <button id="pay-button" 
        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded shadow transition">
        Bayar Sekarang
    </button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" 
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        if (!confirm("Apakah Anda yakin ingin melanjutkan pembayaran sekarang?")) return;

        const snapToken = "{{ $snapToken }}";
        if (!snapToken || snapToken === "null") {
            alert('Token pembayaran tidak ditemukan. Silakan ulangi checkout.');
            return;
        }

        window.snap.pay(snapToken, {
            onSuccess: function(result) {
                window.location.href = "/payment/success/" + result.order_id;
            },
            onPending: function(result) {
                alert('Pembayaran Anda tertunda. Cek status di halaman pesanan.');
            },
            onError: function(result) {
                alert('Pembayaran gagal. Silakan coba lagi.');
            },
            onClose: function() {
                alert('Transaksi dibatalkan.');
            }
        });
    });
</script>
@endsection
