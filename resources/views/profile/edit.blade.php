@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-8">
    <h2 class="text-2xl font-semibold text-purple-700 mb-6">Edit Profil</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
            @error('email')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Lama -->
        <div class="mb-4">
            <label for="current_password" class="block text-gray-700">Password Saat Ini</label>
            <input type="password" name="current_password" id="current_password"
                   class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
            @error('current_password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Baru -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password Baru</label>
            <input type="password" name="password" id="password"
                   class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-purple-300">
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end">
            <button type="submit" class="bg-purple-700 text-white px-6 py-2 rounded-md hover:bg-purple-800 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
