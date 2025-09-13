<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pesanan;

class PaymentController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function getSnapToken(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => uniqid('ORDER-'),
                'gross_amount' => $request->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->telepon,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function paymentSuccess($order_id)
    {
        // Cari pesanan berdasarkan kode pesanan
        $pesanan = Pesanan::where('kode_pesanan', $order_id)->first();

        if (!$pesanan) {
            return redirect()->route('keranjang.index')->with('error', 'Pesanan tidak ditemukan.');
        }

        // Hapus keranjang dari session
        Session::forget('keranjang');
        if (auth()->check()) {
            Session::forget('keranjang_' . auth()->id());
        }

        return redirect()->route('pesanan.show', $pesanan->id)
            ->with('success', 'Pembayaran berhasil. Terima kasih!');
    }
}
