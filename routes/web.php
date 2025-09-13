<?php

use App\Http\Controllers\Admin\CabangController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;

// Landing page
Route::get('/', fn() => view('landing'));

// Auth routes (login, register, email verification, password reset)
Auth::routes(['verify' => true]);

// Override register/login controllers (optional, if you customize)
Route::get('/register', [RegisterUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterUserController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Home (after login & email verified)
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware(['auth', 'verified']);


// ─── ADMIN ───────────────────────────────────────────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth') // hanya auth, tanpa middleware role
    ->group(function () {
        // Dashboard
        Route::get('dashboard', [AdminController::class, 'index'])
            ->name('dashboard');
        // … tambahkan route admin lainnya di sini …
    });


// ─── KARYAWAN ────────────────────────────────────────────────────
Route::prefix('karyawan')
    ->name('karyawan.')
    ->middleware('auth')
    ->group(function () {
        // Dashboard
        Route::get('dashboard', [KaryawanController::class, 'index'])
            ->name('dashboard');
        // … tambahkan route karyawan lainnya di sini …
    });

// ─── PELANGGAN / USER ────────────────────────────────────────────
Route::prefix('user')
    ->name('user.')
    ->middleware(['auth', 'role:pelanggan'])
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'user'])
            ->name('dashboard');
    });


// ─── PRODUK & KERANJANG ───────────────────────────────────────────
Route::resource('produk', ProdukController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::get('/keranjang', [KeranjangController::class, 'index'])
    ->name('keranjang.index');
Route::post('/keranjang', [KeranjangController::class, 'store'])
    ->name('keranjang.store');
Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])
    ->name('keranjang.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


// ← Ini yang penting!

Route::middleware(['auth'])->group(function () {
    Route::get('/karyawan/pesanan', [PesananController::class, 'kelolaPesanan'])->name('karyawan.pesanan');
    Route::get('/karyawan/pesanan/{id}/edit', [PesananController::class, 'editStatus'])->name('karyawan.pesanan.edit');
    Route::put('/karyawan/pesanan/{id}', [PesananController::class, 'updateStatus'])->name('karyawan.pesanan.update');
    Route::delete('/karyawan/pesanan/{id}', [PesananController::class, 'destroy'])->name('karyawan.pesanan.destroy');

});


Route::middleware('auth')->group(function () {
    // Display list of orders
    Route::get('pesanans', [PesananController::class, 'index'])->name('pesanan.index');

    // Display details of a specific order
    Route::get('pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');

    // Store a new order (this is a POST request)
    Route::post('pesanan', [PesananController::class, 'store'])->name('pesanan.store');
});

Route::get('/riwayat', [PesananController::class, 'riwayat'])->name('pesanan.riwayat');



use App\Http\Controllers\Admin\ProdukController as AdminProdukController;

Route::get('/admin/produk', [AdminProdukController::class, 'index'])->name('admin.produk.index');
Route::get('/admin/produk/create', [AdminProdukController::class, 'create'])->name('admin.produk.create');
Route::post('/admin/produk', [AdminProdukController::class, 'store'])->name('admin.produk.store');
Route::get('/admin/produk/{produk}', [AdminProdukController::class, 'show'])->name('admin.produk.show');
Route::get('/admin/produk/{produk}/edit', [AdminProdukController::class, 'edit'])->name('admin.produk.edit'); // ✅ GET
Route::put('/admin/produk/{produk}', [AdminProdukController::class, 'update'])->name('admin.produk.update');   // ✅ PUT
Route::delete('/admin/produk/{produk}', [AdminProdukController::class, 'destroy'])->name('admin.produk.destroy');




// Menampilkan laporan harian
Route::get('/karyawan/laporan/harian', [LaporanController::class, 'harian'])->name('karyawan.laporan.harian');

// Menampilkan laporan harian dalam format PDF
Route::get('/karyawan/laporan/harian/cetak', [LaporanController::class, 'cetakHarian'])->name('karyawan.cetak.laporan.harian');

Route::get('/karyawan/laporan/mingguan', [LaporanController::class, 'mingguan'])->name('karyawan.laporan.mingguan');
Route::get('/karyawan/laporan/mingguan/cetak', [LaporanController::class, 'cetakMingguan'])->name('karyawan.cetak.laporan.mingguan');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('cabang', [CabangController::class, 'index'])->name('cabang.index');
    Route::get('cabang/create', [CabangController::class, 'create'])->name('cabang.create');
    Route::post('cabang', [CabangController::class, 'store'])->name('cabang.store');
    Route::get('cabang/{id}/edit', [CabangController::class, 'edit'])->name('cabang.edit');
    Route::put('cabang/{id}', [CabangController::class, 'update'])->name('cabang.update');
    Route::delete('cabang/{id}', [CabangController::class, 'destroy'])->name('cabang.destroy');
});


use App\Http\Controllers\AboutController;

Route::get('/tentang-kami', [AboutController::class, 'index'])->name('tentang-kami');


Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('pesanan/{id}', [PesananController::class, 'show'])->name('pesanan.show');
    Route::get('/pesanan/kode/{kode_pesanan}', [\App\Http\Controllers\PesananController::class, 'showByKode'])->name('pesanan.kode');
});

use App\Http\Controllers\PaymentController;

Route::post('/payment/notification', [PaymentController::class, 'notificationHandler'])->name('payment.notification');

// Redirect setelah pembayaran sukses
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

Route::get('/payment/success/{order_id}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');