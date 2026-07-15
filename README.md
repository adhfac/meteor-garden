# Dokumentasi Proyek: Kursus Online "Meteor Garden"

Aplikasi web Kursus Online "Meteor Garden" adalah platform sistem informasi yang dirancang untuk mengelola proses pendaftaran akun peserta, pemilihan kelas kursus, konfirmasi pembayaran, hingga manajemen pengumuman secara daring.

---

## 👥 Aktor & *Use Case* Sistem

Aplikasi ini melibatkan dua aktor utama dengan hak akses dan fungsi (*use case*) sebagai berikut:

### a. Calon Peserta Kursus

Aktor yang berinteraksi dengan sistem untuk melakukan pendaftaran hingga mengikuti proses kursus.

* **Melakukan Pendaftaran Akun:** Membuat akun baru di platform.
* **Melihat Status Pendaftaran Akun:** Memantau apakah akun sudah disetujui/diverifikasi oleh Admin.
* **Login ke Aplikasi:** Masuk ke sistem menggunakan akun yang terdaftar.
* **Melakukan Pendaftaran Kelas Kursus:** Memilih dan mendaftar pada kelas kursus yang tersedia.
* **Melihat Status Pendaftaran Kelas:** Memeriksa status persetujuan kelas yang diikuti.
* **Melakukan Konfirmasi Pembayaran:** Mengunggah atau mengirimkan bukti pembayaran kelas.
* **Melihat Pengumuman:** Membaca informasi penting yang diterbitkan oleh Admin.

### b. Admin

Aktor internal yang bertanggung jawab atas pengelolaan data, verifikasi, dan keberlangsungan operasional aplikasi.

* **Login ke Aplikasi:** Masuk ke halaman dasbor admin dengan hak akses khusus.
* **Memverifikasi Pendaftaran Akun:** Menerima atau menolak pendaftaran akun calon peserta baru.
* **Memverifikasi Pendaftaran Kelas:** Menerima atau menolak permohonan peserta untuk bergabung di suatu kelas.
* **Memverifikasi Pembayaran:** Memvalidasi bukti transfer/pembayaran yang dikirim oleh peserta (Menerima/Menolak).
* **Mengelola Pengumuman:** Membuat (*Create*), membaca (*Read*), mengubah (*Update*), dan menghapus (*Delete*) pengumuman pada sistem.

---

## 🛠️ Spesifikasi Aplikasi & Dependensi

Proyek ini dibangun menggunakan kerangka kerja Laravel versi terbaru yang membutuhkan lingkungan kerja modern.

### Spesifikasi Utama

* **Framework Version:** Laravel `v13.19.0`
* **PHP Version:** Minimal **PHP 8.3**, serta mendukung **PHP 8.4** dan **PHP 8.5**.
> ⚠️ **PENTING:** Aplikasi ini **tidak mendukung** versi PHP di bawah 8.3 (Legacy/Versi lama). Pastikan lingkungan lokal Anda sudah menggunakan versi PHP yang sesuai.



### Dependensi Utama (`composer.json`)

* `php`: `^8.3`
* `laravel/framework`: `^13.8`
* `laravel/tinker`: `^3.0`
* `phpunit/phpunit`: `^11.5.50 || ^12.5.8 || ^13.0.3` *(Untuk Keperluan Testing)*

---

## 🚀 Panduan Instalasi & Cara Menjalankan

Ikuti langkah-langkah di bawah ini untuk memasang dan menjalankan proyek di komputer lokal Anda:

### 1. Kloning Repositori

Buka Terminal (Linux/macOS) atau Command Prompt/PowerShell (Windows), lalu klon repositori proyek ini:

```bash
git clone https://github.com/adhfac/meteor-garden.git

```

### 2. Masuk ke Direktori Proyek

Pindah ke dalam folder proyek yang baru saja di-clone:

```bash
cd meteor-garden

```

### 3. Konfigurasi Environment File

Salin file `.env.example` menjadi file `.env` baru:

* **Windows (PowerShell):**
```powershell
copy .env.example .env

```


* **Linux / macOS / Git Bash:**
```bash
cp .env.example .env

```



> *Catatan: Buka file `.env` yang baru dibuat dan sesuaikan konfigurasi database Anda (misal: `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).*

### 4. Instalasi Dependensi PHP

Jalankan Composer untuk mengunduh semua pustaka/dependensi yang dibutuhkan:

```bash
composer install

```

### 5. Generate Application Key

Buat *security key* unik untuk aplikasi Laravel Anda:

```bash
php artisan key:generate

```

### 6. Jalankan Server Database

Buka aplikasi *local server* pilihan Anda (seperti **XAMPP** atau **Laragon**), lalu aktifkan layanan berikut:

* **MySQL Database**
* **Nginx** atau **Apache**
*(Pastikan Anda juga telah membuat database kosong di phpMyAdmin/Sequel Pro sesuai dengan nama yang ada di `.env`)*

### 7. Migrasi Database

Jalankan perintah berikut untuk membuat struktur tabel database yang dibutuhkan aplikasi:

```bash
php artisan migrate

```

### 8. Database Seeding (Mengisi Data Awal)

Masukkan data awal (seperti akun admin default atau data kelas contoh) ke dalam database:

```bash
php artisan db:seed --class=DatabaseSeeder

```

*(Catatan: Jika Anda mengalami eror `mb_strimwidth()`, pastikan ekstensi `mbstring` sudah diaktifkan pada file `php.ini` Anda).*

### 9. Menjalankan Aplikasi

Setelah semua proses di atas selesai, jalankan server pengembangan lokal dengan perintah:

```bash
composer run dev

```

Aplikasi sekarang dapat diakses melalui browser Anda (biasanya di alamat `http://127.0.0.1:8000` atau *virtual host* bawaan Laragon).
