<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Panel Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #f9fafb, #e0e7ff);
        }
    </style>
</head>

<body class="text-gray-800">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white/90 backdrop-blur-md shadow-2xl p-6 flex flex-col justify-between border-r border-gray-200 fixed h-full">
        <div>
            <div class="mb-10">
                <h1 class="text-2xl font-bold text-purple-700 tracking-wide">Baby Gemez</h1>
                <p class="text-sm text-gray-500">Panel Karyawan</p>
            </div>

            <nav class="space-y-2 text-base font-medium">
                <a href="{{ route('karyawan.dashboard') }}"
                   class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-purple-500 hover:text-white transition-all duration-300 @if(request()->routeIs('karyawan.dashboard')) bg-purple-600 text-white @endif">
                    🏠 Dashboard
                </a>
                <a href="{{ route('karyawan.pesanan') }}"
                   class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-purple-500 hover:text-white transition-all duration-300 @if(request()->routeIs('karyawan.pesanan')) bg-purple-600 text-white @endif">
                    📦 Kelola Pesanan
                </a>
                <!-- Menambahkan menu laporan keuangan -->
                <a href="{{ route('karyawan.laporan.harian') }}"
                   class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-purple-500 hover:text-white transition-all duration-300 @if(request()->routeIs('karyawan.laporan.harian')) bg-purple-600 text-white @endif">
                    💰 Laporan Keuangan
                </a>
            </nav>
        </div>

        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-300">
                    🔒 Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64 p-10 bg-white/80 backdrop-blur-sm">
        <div class="mb-6">
            <h2 class="text-3xl font-semibold text-purple-800">@yield('title')</h2>
            <div class="h-1 w-20 bg-purple-500 rounded mt-2"></div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>
