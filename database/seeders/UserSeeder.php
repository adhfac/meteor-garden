<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@kursus.com',
            'password' => Hash::make('admin123'),
            'no_hp' => '081111111111',
            'role' => 'admin',
            'status_akun' => 'diterima',
            'tanggal_daftar' => now(),
        ]);

        // Peserta 1
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password123'),
            'no_hp' => '081234567890',
            'role' => 'peserta',
            'status_akun' => 'pending',
            'tanggal_daftar' => now(),
        ]);

        // Peserta 2
        User::create([
            'name' => 'Siti Aisyah',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password123'),
            'no_hp' => '081298765432',
            'role' => 'peserta',
            'status_akun' => 'diterima',
            'tanggal_daftar' => now(),
        ]);

        // Peserta 3
        User::create([
            'name' => 'Andi Saputra',
            'email' => 'andi@gmail.com',
            'password' => Hash::make('password123'),
            'no_hp' => '081355577799',
            'role' => 'peserta',
            'status_akun' => 'ditolak',
            'tanggal_daftar' => now(),
        ]);
    }
}