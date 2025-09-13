<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Str;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjang = Session::get('keranjang', []);
        return view('checkout.index', compact('keranjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang' => 'required|string',
            'metode_pembayaran' => 'required|in:COD,Online',
        ]);

        $keranjang = Session::get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong!');
        }

        $keranjangTemp = $keranjang;

        DB::beginTransaction();

        try {
            $total = 0;
            $produkPivot = [];

            foreach ($keranjang as $item) {
                $produk = Produk::findOrFail($item['id']);
                if ($produk->stok < $item['jumlah']) {
                    throw new \Exception("Stok tidak cukup untuk produk {$produk->nama_produk}");
                }

                $produk->stok -= $item['jumlah'];
                $produk->save();

                $subtotal = $item['harga'] * $item['jumlah'];
                $total += $subtotal;

                $produkPivot[$produk->id] = [
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['harga'],
                ];
            }

            $pesanan = new Pesanan();
            $pesanan->user_id = auth()->id();
            $pesanan->kode_pesanan = 'ORD-' . strtoupper(Str::random(8));
            $pesanan->cabang = $request->cabang;
            $pesanan->metode_pembayaran = $request->metode_pembayaran;
            $pesanan->total = $total;
            $pesanan->status = 'Menunggu Konfirmasi';
            $pesanan->save();

            $pesanan->produk()->attach($produkPivot);

            DB::commit();

            if ($pesanan->metode_pembayaran === 'Online') {
                // Konfigurasi Midtrans
                Config::$serverKey = config('services.midtrans.server_key');
                Config::$isProduction = config('services.midtrans.is_production');
                Config::$isSanitized = config('services.midtrans.is_sanitized');
                Config::$is3ds = config('services.midtrans.is_3ds');

                $params = [
                    'transaction_details' => [
                        'order_id' => $pesanan->kode_pesanan,
                        'gross_amount' => $pesanan->total,
                    ],
                    'customer_details' => [
                        'first_name' => auth()->user()->name,
                        'email' => auth()->user()->email,
                    ],
                ];

                Log::info('Midtrans Params: ', $params);

                try {
                    $snapToken = Snap::getSnapToken($params);
                    if (!$snapToken) {
                        throw new \Exception("Gagal mendapatkan Snap Token dari Midtrans.");
                    }

                    Log::info('Snap Token Berhasil: ' . $snapToken);

                    // Jangan hapus keranjang di sini! Tunggu sampai pembayaran berhasil (di PaymentController)
                    return view('checkout.midtrans', compact('pesanan', 'snapToken'));

                } catch (\Exception $e) {
                    Log::error('Midtrans Snap Token Error: ' . $e->getMessage());
                    return redirect()->route('keranjang.index')->with('error', 'Gagal membuat pembayaran. Silakan coba lagi.');
                }
            }

            // Metode COD: hapus keranjang langsung
            Session::forget('keranjang');
            if (auth()->check()) {
                Session::forget('keranjang_' . auth()->id());
            }

            return redirect()->route('pesanan.show', $pesanan->id)->with('success', 'Pesanan berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Pesanan Gagal: ' . $e->getMessage());

            Session::put('keranjang', $keranjangTemp);
            return redirect()->back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}