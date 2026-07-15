<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pembayaran;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    public function memberIndex()
    {
        $pendaftarans = Pendaftaran::where('id_user', auth()->id())
            ->with('course') // Memuat relasi ke model Course (id_kelas)
            ->get();

        return view('pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $sudahDaftar = Pendaftaran::where('id_user', auth()->id())
            ->where('id_kelas', $course->id)
            ->exists();

        if ($sudahDaftar) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar di kelas ini.');
        }

        DB::transaction(function () use ($course) {
            $pendaftaran = Pendaftaran::create([
                'id_user' => auth()->id(), // Otomatis ambil ID User yang login
                'id_kelas' => $course->id,  // Otomatis ambil ID Kelas dari URL
                'tanggal_daftar' => now(),
                'status_pendaftaran' => 'pending',
                'catatan_admin' => null,
            ]);

            Pembayaran::create([
                'id_pendaftaran' => $pendaftaran->id,
                'tanggal_bayar' => now(),
                'jumlah' => $course->harga,
                'metode_pembayaran' => 'Belum Memilih',
                'bukti_pembayaran' => 'belum_upload.png',
                'status_verifikasi' => 'pending',
                'catatan_admin' => null
            ]);
        });
        return redirect()->route('member.course.index')
            ->with('success', 'Pendaftaran dan tagihan pembayaran berhasil dibuat! Silakan cek menu pembayaran.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.edit', compact('pendaftaran'));
    }

    /**
     * Update only the status of the registration.
     */
    public function updateStatus(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status_pendaftaran' => 'required|in:pending,diterima,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $pendaftaran->update([
            'status_pendaftaran' => $request->status_pendaftaran,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil dihapus.');
    }
}