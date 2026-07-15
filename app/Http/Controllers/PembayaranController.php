<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with(['pendaftaran.user', 'pendaftaran.course'])->get();
        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function memberIndex()
    {
        $pembayarans = Pembayaran::whereHas('pendaftaran', function ($query) {
            $query->where('id_user', auth()->id());
        })->with(['pendaftaran.course'])->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    /**
     * Menampilkan form upload bukti pembayaran
     */
    public function memberEdit(Pembayaran $pembayaran)
    {
        // Proteksi: Pastikan pembayaran ini memang milik user yang login
        if ($pembayaran->pendaftaran->id_user !== auth()->id()) {
            abort(403, 'Aksi Tidak Diizinkan.');
        }

        return view('pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Memproses upload file bukti pembayaran
     */
    public function memberUpdate(Request $request, Pembayaran $pembayaran)
    {
        // Proteksi kepemilikan
        if ($pembayaran->pendaftaran->id_user !== auth()->id()) {
            abort(403, 'Aksi Tidak Diizinkan.');
        }

        $request->validate([
            'metode_pembayaran' => ['required', 'string', 'max:255'],
            'bukti_pembayaran' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // Maksimal 2MB
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            // Hapus file lama jika sebelumnya sudah pernah upload dan bukan file default
            if ($pembayaran->bukti_pembayaran && $pembayaran->bukti_pembayaran !== 'belum_upload.png') {
                Storage::disk('public')->delete('bukti_transfer/' . $pembayaran->bukti_pembayaran);
            }

            // Simpan file baru dengan nama unik
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . auth()->id() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('bukti_transfer', $filename, 'public');

            $pembayaran->bukti_pembayaran = $filename;
        }

        // Update data lainnya dan kembalikan status ke pending (jika sebelumnya ditolak)
        $pembayaran->update([
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => now(),
            'status_verifikasi' => 'pending', // Menunggu konfirmasi admin kembali
        ]);

        return redirect()->route('member.pembayaran.index')->with('success', 'Bukti pembayaran berhasil diunggah. Menunggu verifikasi admin.');
    }

    /**
     * Show the form for editing the specified resource (Untuk Admin).
     */
    public function edit(Pembayaran $pembayaran)
    {
        // Memuat relasi agar informasi di halaman edit lengkap
        $pembayaran->load(['pendaftaran.user', 'pendaftaran.course']);

        return view('admin.pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage (Untuk Admin).
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        // 1. Validasi input status dan catatan dari admin
        $request->validate([
            'status_verifikasi' => ['required', 'in:pending,diterima,ditolak'],
            'catatan_admin' => ['nullable', 'string'],
        ]);

        // 2. Gunakan DB Transaction agar update di kedua tabel aman
        \Illuminate\Support\Facades\DB::transaction(function () use ($request, $pembayaran) {

            // A. Update status pembayaran
            $pembayaran->update([
                'status_verifikasi' => $request->status_verifikasi,
                'catatan_admin' => $request->catatan_admin,
            ]);

            // B. Otomatis update status pendaftaran jika pembayaran diterima
            if ($request->status_verifikasi === 'diterima') {
                $pembayaran->pendaftaran->update([
                    'status_pendaftaran' => 'diterima'
                ]);
            } elseif ($request->status_verifikasi === 'ditolak') {
                // Jika ditolak, kembalikan status pendaftaran ke ditolak/pending sesuai kebijakan
                $pembayaran->pendaftaran->update([
                    'status_pendaftaran' => 'ditolak'
                ]);
            }
        });

        return redirect()->route('pembayaran.index')
            ->with('success', 'Status verifikasi pembayaran berhasil diperbarui.');
    }

}
