@extends('layouts.app')
@section('title', 'Detail Kelas - ' . $course->nama_kelas)
@section('content')
    @include('partials.navbar1')

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Kelas: {{ $course->nama_kelas }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th width="200" class="bg-light">Nama Kelas</th>
                                <td><strong>{{ $course->nama_kelas }}</strong></td>
                            </tr>
                            <tr>
                                <th class="bg-light">Deskripsi</th>
                                <td>{{ $course->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Harga</th>
                                <td>Rp {{ number_format($course->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Kapasitas</th>
                                <td>{{ $course->kapasitas }} Peserta</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tanggal Mulai</th>
                                <td>{{ \Carbon\Carbon::parse($course->tanggal_mulai)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tanggal Selesai</th>
                                <td>{{ \Carbon\Carbon::parse($course->tanggal_selesai)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Status</th>
                                <td>
                                    @if ($course->status == 'aktif')
                                        <span class="badge bg-success">AKTIF</span>
                                    @else
                                        <span class="badge bg-danger">TIDAK AKTIF</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <form action="{{ route('member.pendaftaran.store', $course->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah Anda yakin ingin mendaftar ke kelas ini? Tagihan pembayaran akan otomatis diterbitkan.');">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Daftar Kelas Sekarang
                        </button>
                    </form>
                    <a href="{{ route('member.course.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Kelas
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
