<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby Gemez - MPASI Sehat & Lezat</title>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- @vite('resources/css/app.css')
    
     --}}
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Link CSS AOS (Animate on Scroll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <style>
        /* Efek animasi tambahan */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-purple-900 text-white">

    <!-- Header -->
    <header class="flex justify-between items-center p-5 bg-purple-800 shadow-md" data-aos="fade-down">
        <div class="flex items-center">
            <img src="{{ asset('images/bayi.png') }}" alt="Logo" class="w-12 h-12 rounded-full">
            <h1 class="ml-3 text-2xl font-bold">Baby Gemez</h1>
        </div>
        <div>
            <a href="/register" class="bg-white text-purple-900 px-4 py-2 rounded-full font-bold hover:bg-gray-200 transition">Daftar</a>
            <a href="/login" class="bg-white text-purple-900 px-4 py-2 rounded-full ml-2 font-bold hover:bg-gray-200 transition">Masuk</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between mx-auto max-w-7xl p-8 mt-10 relative">
        <div class="absolute inset-0 bg-purple-700 rounded-2xl shadow-lg w-full h-full mx-auto"></div>

        <div class="md:w-1/2 text-center md:text-left relative z-10 p-8" data-aos="fade-right">
            <h1 class="text-4xl font-extrabold leading-tight text-white">
                MPASI TEPAT, <span class="text-yellow-400">ANAK SEHAT!</span>
            </h1>
            <p class="mt-4 text-lg text-gray-200">
                Berikan yang terbaik untuk si kecil dengan menu MPASI bernutrisi, lezat, dan praktis, yang tidak hanya mendukung tumbuh kembangnya tetapi juga memudahkan para orang tua dalam menyiapkan makanan sehat setiap hari.
            </p>
            <a href="register" class="bg-yellow-400 text-purple-900 font-bold px-6 py-3 mt-6 inline-block rounded-lg shadow-md hover:bg-yellow-300 transition">
                Lihat Menu MPASI 🍲
            </a>
        </div>

        <div class="md:w-1/2 flex justify-center relative z-10 floating">
            <img src="{{ asset('images/banner food.jpg') }}" alt="MPASI Baby Gemez" class="w-[450px] rounded-lg shadow-lg">
        </div>
    </section>

    <!-- Keunggulan Baby Gemez -->
    <section class="mt-16 text-center">
        <h2 class="text-3xl font-bold text-white" data-aos="zoom-in">Kenapa Pilih Baby Gemez? 🍼</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto p-10">
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up">
                <h3 class="text-xl font-bold">✅ MPASI Bergizi Seimbang</h3>
                <p>Dirancang oleh ahli gizi untuk memenuhi kebutuhan nutrisi anak.</p>
            </div>
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-xl font-bold">✅ Praktis & Higienis</h3>
                <p>Dikemas dengan baik, mudah disajikan, dan tanpa bahan pengawet.</p>
            </div>
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-xl font-bold">✅ Variasi Menu Lezat</h3>
                <p>Beragam pilihan rasa yang disukai si kecil setiap harinya.</p>
            </div>
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up" data-aos-delay="300">
                <h3 class="text-xl font-bold">✅ Konsultasi Ahli Gizi</h3>
                <p>Dapatkan saran dari ahli tentang nutrisi MPASI yang tepat.</p>
            </div>
        </div>
    </section>

    <!-- Menu Produk -->
    <section class="mt-16 p-10">
        <h2 class="text-3xl font-bold text-center" data-aos="zoom-in">Menu MPASI Sehat 🍲</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto mt-6">
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up">
                <img src="{{ asset('images/bubur.png') }}" alt="MPASI 1" class="w-full h-48 object-cover rounded-lg">
                <h3 class="text-xl font-bold mt-4">Bubur MPASI</h3>
                <p class="mt-2">Kaya protein dan serat untuk tumbuh kembang si kecil.</p>
                
            </div>
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up">
                <img src="{{ asset('images/sop.png') }}" alt="MPASI 2" class="w-full h-48 object-cover rounded-lg">
                <h3 class="text-xl font-bold mt-4">Sop MPASI</h3>
                <p class="mt-2">Tekstur lembut dengan kandungan lemak sehat.</p>
                
            </div>
            <div class="bg-purple-700 p-6 rounded-lg shadow-lg hover:scale-105 transition" data-aos="fade-up">
                <img src="{{ asset('images/pudding.png') }}" alt="MPASI 2" class="w-full h-48 object-cover rounded-lg">
                <h3 class="text-xl font-bold mt-4">Pudding MPASI</h3>
                <p class="mt-2">Tekstur lembut dengan kandungan lemak sehat.</p>
                
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer class="bg-purple-800 text-center p-6 mt-10">
        <h3 class="font-bold">Baby Gemez - Aplikasi penjualan bubur bayi berbasis website </h3>
        <p>📞 Hubungi kami: 089664375469</p>
        <p>📧 Email: support@babygemez.com</p>
        <p class="mt-4">&copy; 2025 Baby Gemez. All Rights Reserved.</p>
    </footer>

    <!-- Script AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
