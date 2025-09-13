<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Baby Gemez @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Heroicons (opsional, untuk icon) -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-purple-800 text-white flex flex-col p-6 space-y-6">
            <div>
                <h1 class="text-2xl font-bold tracking-wide mb-6">Admin Baby Gemez</h1>
                <nav class="space-y-4">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 hover:bg-purple-700 px-4 py-2 rounded transition">
                        <span data-feather="home" class="w-5 h-5"></span>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.produk.index') }}" class="flex items-center space-x-2 hover:bg-purple-700 px-4 py-2 rounded transition">
                        <span data-feather="package" class="w-5 h-5"></span>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="{{ route('admin.cabang.index') }}" class="flex items-center space-x-2 hover:bg-purple-700 px-4 py-2 rounded transition">
                        <span data-feather="map-pin" class="w-5 h-5"></span>
                        <span>Profil Cabang</span>
                    </a>
                </nav>
            </div>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-auto">
                @csrf
                <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white font-medium transition">
                    Logout
                </button>
            </form>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
