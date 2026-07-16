<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengumuman;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengumuman::create([
            [
                'id_admin' => '1',
                'judul' => 'Kelas MERN Stack Telah Dibuka!', 
                'isi' => 'Sepanjang kursus, Anda akan mengimplementasikan fitur-fitur utama aplikasi kasir seperti manajemen produk, transaksi penjualan, pencatatan pelanggan, cetak struk, dan laporan pendapatan secara real-time. Tidak hanya sekadar teori, kursus ini menekankan pada pendekatan project-based learning, sehingga Anda akan memiliki portofolio aplikasi kasir yang siap digunakan dan dapat dikembangkan lebih lanjut!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
