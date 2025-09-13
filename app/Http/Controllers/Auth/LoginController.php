<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Default redirect jika tidak ada role match.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Redirect setelah berhasil login berdasarkan role user.
     */
    protected function authenticated(Request $request, $user)
    {
        session()->forget('keranjang');

        $keranjangKey = 'keranjang_' . $user->id;
        $keranjang = session()->get($keranjangKey, []);
        session()->put('keranjang', $keranjang);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'karyawan') {
            return redirect()->route('karyawan.dashboard');
        }

        if ($user->role === 'pelanggan') {
            return redirect()->route('home');
        }
        


        // Role tak dikenali → logout dan error
        Auth::logout();
        return redirect('/login')->withErrors([
            'email' => 'Role tidak dikenali. Hubungi admin.',
        ]);
        
    }
}
