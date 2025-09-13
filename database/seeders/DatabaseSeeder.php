<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin ',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Karyawan ',
            'email' => 'karyawan@example.com',
            'password' => Hash::make('password'),
            'role' => 'karyawan',
        ]);

        User::create([
            'name' => 'Pelanggan ',
            'email' => 'pelanggan@example.com',
            'password' => Hash::make('password'),
            'role' => 'pelanggan',
        ]);
    }
}
