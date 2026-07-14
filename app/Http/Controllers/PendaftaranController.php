<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['users', 'courses'])->get();
        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendaftaranRequest $request)
    {
        $validated = $request->validated();

        Pendaftaran::create([
            'id_user' => $validated['id_user'],
            'id_kelas' => $validated['id_kelas'],
            'tanggal_daftar' => now(),
            'status_pendaftaran' => 'pending',
            'catatan_admin' => $validated['catatan_admin'] ?? null,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil ditambahkan.');
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
     * Update the specified resource in storage.
     */
    public function update(UpdatePendaftaranRequest $request, Pendaftaran $pendaftaran)
    {
        $validated = $request->validated();

        $pendaftaran->update([
            'id_user' => $validated['id_user'],
            'id_kelas' => $validated['id_kelas'],
            'status_pendaftaran' => $validated['status_pendaftaran'],
            'catatan_admin' => $validated['catatan_admin'] ?? null,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil diperbarui.');
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