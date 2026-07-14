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

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
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
        
    });