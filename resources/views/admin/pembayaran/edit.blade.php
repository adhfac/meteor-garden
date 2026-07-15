@extends('layouts.app')
@section('title', 'Proses Verifikasi Pembayaran')
@section('content')
    @include('partials.navbar')

    <x-form-card title="Proses Verifikasi Pembayaran" action="{{ route('pembayaran.update', $pembayaran->id) }}" method="PUT"
        submitText="Simpan Verifikasi" submitIcon="bi-check-circle" cancelRoute="{{ route('pembayaran.index') }}">
        {{-- Informasi Peserta --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="card-title text-primary mb-3">
                            <i class="bi bi-person-circle"></i> Informasi Peserta
                        </h6>
                        <table class="table table-sm table-borderless mb-0">
                            <tr>
                                <td width="150"><strong>Nama Peserta</strong></td>
                                <td>: {{ $pembayaran->pendaftaran->user->nama ?? $pembayaran->pendaftaran->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Kelas Pilihan</strong></td>
                                <td>: {{ $pembayaran->pendaftaran->course->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Nominal</strong></td>
                                <td>: <strong class="text-success">Rp
                                        {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Metode Pembayaran</strong></td>
                                <td>:
                                    @if ($pembayaran->metode_pembayaran == 'transfer_bank')
                                        <span class="badge bg-info">Transfer Bank</span>
                                    @elseif($pembayaran->metode_pembayaran == 'cash')
                                        <span class="badge bg-success">Cash</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $pembayaran->metode_pembayaran }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Status Saat Ini</strong></td>
                                <td>:
                                    @if ($pembayaran->status_verifikasi === 'diterima')
                                        <span class="badge bg-success">DITERIMA / LUNAS</span>
                                    @elseif($pembayaran->status_verifikasi === 'pending')
                                        <span class="badge bg-warning text-dark">PENDING</span>
                                    @else
                                        <span class="badge bg-danger">DITOLAK</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <h6 class="card-title text-primary mb-3">
                            <i class="bi bi-image"></i> Bukti Pembayaran
                        </h6>
                        @if ($pembayaran->bukti_pembayaran && $pembayaran->bukti_pembayaran !== 'belum_upload.png')
                            <div class="text-center">
                                <a href="{{ asset('storage/bukti_transfer/' . $pembayaran->bukti_pembayaran) }}"
                                    target="_blank">
                                    <img src="{{ asset('storage/bukti_transfer/' . $pembayaran->bukti_pembayaran) }}"
                                        alt="Bukti Transfer" class="img-fluid rounded border"
                                        style="max-height: 200px; cursor: pointer;">
                                    <br>
                                    <small class="text-muted">
                                        <i class="bi bi-zoom-in"></i> Klik untuk memperbesar gambar
                                    </small>
                                </a>
                            </div>
                        @else
                            <div class="text-center text-muted py-3">
                                <i class="bi bi-cloud-slash" style="font-size: 3rem; display: block;"></i>
                                <span>Peserta belum mengunggah berkas bukti transaksi.</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <hr>

        {{-- Form Verifikasi --}}
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label"><strong>Tindakan Status Verifikasi</strong></label>
                    <select name="status_verifikasi" class="form-select" required>
                        <option value="pending"
                            {{ old('status_verifikasi', $pembayaran->status_verifikasi) == 'pending' ? 'selected' : '' }}>
                            Pending (Tinjau Ulang)
                        </option>
                        <option value="diterima"
                            {{ old('status_verifikasi', $pembayaran->status_verifikasi) == 'diterima' ? 'selected' : '' }}>
                            Diterima (Sah / Lunas)
                        </option>
                        <option value="ditolak"
                            {{ old('status_verifikasi', $pembayaran->status_verifikasi) == 'ditolak' ? 'selected' : '' }}>
                            Ditolak (Bermasalah)
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Catatan / Alasan (Opsional)</strong></label>
                    <textarea name="catatan_admin" rows="4" class="form-control"
                        placeholder="Contoh: Bukti transfer tidak jelas atau nominal kurang.">{{ old('catatan_admin', $pembayaran->catatan_admin) }}</textarea>
                </div>
            </div>
        </div>
    </x-form-card>

@endsection
