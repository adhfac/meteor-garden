@extends('layouts.app')
@section('title', 'Dashboard Peserta')
@section('content')
    @include('partials.navbar1')

    <div class="container py-4">
        {{-- Welcome Section --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0 bg-primary text-white">
                    <div class="card-body py-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                                <p class="mb-0 opacity-75">Kelola aktivitas kursus Anda dengan mudah di sini.</p>
                            </div>
                            <div class="text-end">
                                <i class="bi bi-mortarboard-fill" style="font-size: 3rem; opacity: 0.5;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Menu Utama --}}
        <div class="row g-4">
            {{-- Cari & Daftar Kelas --}}
            <div class="col-md-3 col-6">
                <a href="{{ route('member.course.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 hover-card">
                        <div class="card-body text-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-search text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="mb-1">Cari Kelas</h6>
                            <small class="text-muted">Daftar kelas baru</small>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Riwayat Pendaftaran --}}
            <div class="col-md-3 col-6">
                <a href="{{ route('member.pendaftaran.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 hover-card">
                        <div class="card-body text-center">
                            <div class="rounded-circle bg-info bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-list-check text-info" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="mb-1">Pendaftaran</h6>
                            <small class="text-muted">Lihat status</small>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Tagihan Pembayaran --}}
            <div class="col-md-3 col-6">
                <a href="{{ route('member.pembayaran.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 hover-card">
                        <div class="card-body text-center">
                            <div class="rounded-circle bg-success bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-credit-card text-success" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="mb-1">Pembayaran</h6>
                            <small class="text-muted">Tagihan & bayar</small>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Pengumuman --}}
            <div class="col-md-3 col-6">
                <a href="{{ route('member.pengumuman.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 border-0 hover-card">
                        <div class="card-body text-center">
                            <div class="rounded-circle bg-warning bg-opacity-10 d-inline-flex p-3 mb-3">
                                <i class="bi bi-megaphone text-warning" style="font-size: 2rem;"></i>
                            </div>
                            <h6 class="mb-1">Pengumuman</h6>
                            <small class="text-muted">Info terbaru</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Pengumuman Terbaru --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-megaphone-fill"></i> Pengumuman Terbaru</h5>
                        <a href="{{ route('member.pengumuman.index') }}" class="btn btn-light btn-sm">Lihat Semua</a>
                    </div>
                    <div class="card-body">
                        @forelse (App\Models\Pengumuman::latest()->take(3)->get() as $pengumuman)
                            <div class="border-bottom pb-2 mb-2">
                                <h6 class="mb-1">{{ $pengumuman->judul }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ \Carbon\Carbon::parse($pengumuman->created_at)->format('d/m/Y') }}
                                </small>
                                <p class="mb-0 small text-muted">{{ Str::limit($pengumuman->isi, 100) }}</p>
                            </div>
                        @empty
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-info-circle"
                                    style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                                <p>Belum ada pengumuman terbaru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
