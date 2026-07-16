@extends('layouts.app')
@section('title', 'Detail Pengumuman - ' . $pengumuman->judul)
@section('content')
    @include('partials.navbar')

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Pengumuman</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th width="200" class="bg-light">Judul Pengumuman</th>
                                <td><strong>{{ $pengumuman->judul }}</strong></td>
                            </tr>
                            <tr>
                                <th class="bg-light">Isi Pengumuman</th>
                                <td>{{ $pengumuman->isi }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Penulis</th>
                                <td>{{ $pengumuman->admin->name ?? 'Tidak diketahui' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tanggal Dibuat</th>
                                <td>{{ \Carbon\Carbon::parse($pengumuman->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Terakhir Diperbarui</th>
                                <td>{{ \Carbon\Carbon::parse($pengumuman->updated_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('member.pengumuman.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengumuman
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
