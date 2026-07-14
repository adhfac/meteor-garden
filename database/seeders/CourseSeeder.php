<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::insert([
            [
                'nama_kelas' => 'Web Development dengan Laravel',
                'deskripsi' => 'Belajar membangun aplikasi web menggunakan Laravel dari dasar hingga deployment.',
                'harga' => 1500000,
                'kapasitas' => 30,
                'tanggal_mulai' => '2026-08-01',
                'tanggal_selesai' => '2026-10-01',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
