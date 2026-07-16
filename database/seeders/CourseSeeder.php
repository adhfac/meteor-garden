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
                'nama_kelas' => 'Membangun Aplikasi Kasir Menggunakan MERN Stack',
                'deskripsi' => 'Kursus ini dirancang untuk membekali Anda dengan keterampilan praktis dalam membangun aplikasi kasir (point of sale) berbasis web secara end-to-end menggunakan teknologi MERN Stack—salah satu stack pengembangan web paling populer saat ini. Anda akan belajar mulai dari perancangan database, pembuatan RESTful API, hingga pengembangan antarmuka pengguna (UI) yang responsif dan interaktif dengan React.js.
Sepanjang kursus, Anda akan mengimplementasikan fitur-fitur utama aplikasi kasir seperti manajemen produk, transaksi penjualan, pencatatan pelanggan, cetak struk, dan laporan pendapatan secara real-time. Tidak hanya sekadar teori, kursus ini menekankan pada pendekatan project-based learning, sehingga Anda akan memiliki portofolio aplikasi kasir yang siap digunakan dan dapat dikembangkan lebih lanjut.',
                'harga' => 100000,
                'kapasitas' => 30,
                'tanggal_mulai' => '2026-08-01',
                'tanggal_selesai' => '2026-10-01',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => 'Golang Mastery: Belajar Go Dari Nol Sampai Siap Kerja',
                'deskripsi' => 'Ingin menguasai bahasa pemrograman yang digunakan oleh raksasa teknologi seperti Google, Gojek, dan Tokopedia? Kursus ini dirancang khusus untuk pemula tanpa latar belakang coding sekalipun. Kamu akan dipandu langkah demi langkah memahami sintaks dasar, konsep concurrency yang menjadi keunggulan Go, hingga membangun aplikasi pertama secara mandiri. Kelas ini fokus pada praktik langsung dengan studi kasus riil, memastikan kamu siap bersaing di industri backend development modern.',
                'harga' => 200000,
                'kapasitas' => 30,
                'tanggal_mulai' => '2026-08-01',
                'tanggal_selesai' => '2026-15-01',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kelas' => 'AWS Cloud Fundamentals: Kupas Tuntas AWS dari Nol & Siap Sertifikasi',
                'deskripsi' => 'Tertarik memulai karier di dunia Cloud Computing tapi bingung harus mulai dari mana? Kursus ini dirancang khusus untuk pemula tanpa pengalaman cloud sekalipun. Kamu akan belajar memahami konsep dasar cloud, menjelajahi layanan utama AWS seperti EC2, S3, dan RDS, serta memahami sistem keamanan dan penagihan (billing) di AWS. Kurikulum kelas ini telah diselaraskan dengan materi ujian resmi AWS Certified Cloud Practitioner, memberikan kamu bekal yang matang untuk meraih sertifikasi global pertama kamu.',
                'harga' => 1500000,
                'kapasitas' => 30,
                'tanggal_mulai' => '2026-08-01',
                'tanggal_selesai' => '2026-01-02',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
