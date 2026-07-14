<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PesertaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if ($user->role !== 'peserta') {
            abort(403, 'Anda tidak memiliki hak akses sebagai peserta.');
        }

        if ($user->status_akun !== 'diterima') {
            // Kamu bisa menyesuaikan pesan error berdasarkan statusnya
            if ($user->status_akun === 'pending') {
                abort(403, 'Akun Anda masih dalam proses verifikasi (Pending).');
            }

            if ($user->status_akun === 'ditolak') {
                abort(403, 'Mohon maaf, pendaftaran akun Anda ditolak.');
            }

            // Antisipasi jika ada status lain yang tidak dikenal
            abort(403, 'Akses ditolak. Status akun Anda tidak aktif.');
        }

        return $next($request);
    }
}
