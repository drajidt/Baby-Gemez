<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Baby Gemez</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Efek Floating untuk Logo */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        /* Efek Bergerak pada Bokeh */
        @keyframes move-bokeh {
            0% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(20px) translateY(-20px); }
            100% { transform: translateX(0) translateY(0); }
        }

        .bokeh-move {
            animation: move-bokeh 6s infinite alternate ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-900 via-indigo-800 to-purple-900 flex justify-center items-center min-h-screen p-6 relative overflow-hidden">
    
    <!-- Efek Background Bokeh Bergerak -->
    <div class="absolute w-96 h-96 bg-purple-500 rounded-full blur-[140px] opacity-30 top-10 left-10 bokeh-move"></div>
    <div class="absolute w-[500px] h-[500px] bg-purple-600 rounded-full blur-[160px] opacity-20 bottom-10 right-10 bokeh-move"></div>

    <div class="bg-white/10 backdrop-blur-lg text-white p-8 rounded-lg shadow-2xl flex flex-col md:flex-row w-full max-w-4xl overflow-hidden border border-white/20 relative z-10">
        
        <!-- Form Login -->
        <div class="w-full md:w-1/2 p-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-white">Masuk Ke Akun</h2>

            @if (session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-semibold text-sm text-white">Alamat Email</label>
                    <input type="email" name="email" class="w-full p-3 border border-white/30 rounded-lg bg-white/10 focus:ring-2 focus:ring-purple-400 outline-none placeholder-white/50 text-white" placeholder="Email" required>
                </div>
                <div class="mb-6">
                    <label class="block font-semibold text-sm text-white">Password</label>
                    <input type="password" name="password" class="w-full p-3 border border-white/30 rounded-lg bg-white/10 focus:ring-2 focus:ring-purple-400 outline-none placeholder-white/50 text-white" placeholder="Password" required>
                </div>
                <button type="submit" class="bg-purple-500 text-white py-3 px-6 rounded-lg w-full font-bold hover:bg-purple-400 transition duration-300 shadow-lg shadow-purple-500/50 transform hover:scale-105">
                    MASUK
                </button>
            </form>
            <p class="text-sm text-center mt-4 text-white/80">Belum punya akun? <a href="{{ route('register') }}" class="text-purple-400 font-semibold hover:underline">Daftar</a></p>
        </div>

        <!-- Gambar dengan Glow dan Efek Floating -->
        <div class="hidden md:flex md:w-1/2 items-center justify-center relative p-10">
            <!-- Efek Glow Ungu -->
            <div class="absolute w-96 h-96 bg-purple-500 rounded-full blur-[120px] opacity-50"></div>

            <!-- Kotak dengan Efek Glow -->
            <div class="relative w-96 h-96 border-8 border-purple-400 rounded-xl shadow-lg bg-white/10 backdrop-blur-md flex items-center justify-center shadow-[0_0_80px_#a855f7] floating">
                <img src="{{ asset('images/bayi.png') }}" alt="Login" class="w-72 drop-shadow-lg">
            </div>
        </div>

    </div>



</body>
</html>