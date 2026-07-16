<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PembayaranController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [CourseController::class, 'publicIndex'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/cek-status', [UserController::class, 'search'])->name('users.search');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('pengumuman', PengumumanController::class);
        Route::resource('pendaftaran', PendaftaranController::class);
        Route::resource('course', CourseController::class);
        Route::resource('pembayaran', PembayaranController::class);
    });

Route::middleware(['auth', 'peserta'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('peserta.dashboard');
        });
        Route::get('/kelas', [CourseController::class, 'memberIndex'])->name('member.course.index');
        Route::get('/kelas/{course}', [CourseController::class, 'show'])->name('member.course.show');
        Route::post('/kelas/{course}/daftar', [PendaftaranController::class, 'store'])->name('member.pendaftaran.store');
        Route::get('/pembayaran', [PembayaranController::class, 'memberIndex'])->name('member.pembayaran.index');
        Route::get('/pembayaran/{pembayaran}/bayar', [PembayaranController::class, 'memberEdit'])->name('member.pembayaran.edit');
        Route::put('/pembayaran/{pembayaran}', [PembayaranController::class, 'memberUpdate'])->name('member.pembayaran.update');
        Route::get('/pengumuman', [PengumumanController::class, 'memberIndex'])->name('member.pengumuman.index');
        Route::get('/pengumuman/{pengumuman}', [PengumumanController::class, 'show'])->name('member.pengumuman.show');
        Route::get('/pendaftaran', [PendaftaranController::class, 'memberIndex'])->name('member.pendaftaran.index');
    });