@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h2 class="text-xl font-bold text-center text-purple-800 mb-4">Silakan Lanjutkan Pembayaran</h2>

    <div id="snap-container" class="flex justify-center">
        <button id="pay-button"
            class="bg-purple-700 text-white px-6 py-2 rounded shadow hover:bg-purple-800">
            Bayar Sekarang
        </button>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                window.location.href = '/pesanan/sukses';
            },
            onPending: function(result) {
                alert("Pembayaran tertunda.");
                console.log(result);
            },
            onError: function(result) {
                alert("Terjadi kesalahan saat pembayaran.");
                console.log(result);
            },
            onClose: function() {
                alert("Kamu menutup popup pembayaran.");
            }
        });
    });
</script>
@endsection
