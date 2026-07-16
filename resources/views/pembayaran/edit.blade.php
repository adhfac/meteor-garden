@extends('layouts.app')
@section('title', 'Upload Bukti Pembayaran')
@section('content')
    @include('partials.navbar1')

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Konfirmasi Pembayaran Kelas: {{ $pembayaran->pendaftaran->course->nama_kelas }}</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Informasi Tagihan --}}
                <div class="alert alert-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="bi bi-info-circle"></i> Total yang harus dibayar:
                        </span>
                        <strong class="text-success" style="font-size: 1.2rem;">
                            Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}
                        </strong>
                    </div>
                </div>

                <form action="{{ route('member.pembayaran.update', $pembayaran->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Metode Pembayaran --}}
                    <div class="mb-3">
                        <label class="form-label"><strong>Metode Pembayaran</strong></label>
                        <select name="metode_pembayaran" class="form-select" required>
                            <option value="">-- Pilih Bank / E-Wallet --</option>
                            <option value="Transfer Bank Mandiri"
                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Transfer Bank Mandiri' ? 'selected' : '' }}>
                                Transfer Bank Mandiri
                            </option>
                            <option value="Transfer Bank BCA"
                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Transfer Bank BCA' ? 'selected' : '' }}>
                                Transfer Bank BCA
                            </option>
                            <option value="Dana / Gopay"
                                {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Dana / Gopay' ? 'selected' : '' }}>
                                Dana / Gopay
                            </option>
                        </select>
                    </div>

                    {{-- Upload Bukti --}}
                    <div class="mb-3">
                        <label class="form-label"><strong>Pilih File Bukti Transfer</strong></label>
                        <input type="file" name="bukti_pembayaran" class="form-control" required
                            accept=".jpg,.jpeg,.png">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> Format: JPG, JPEG, PNG. Maksimal 2MB
                        </small>
                        @error('bukti_pembayaran')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Preview Gambar --}}
                    <div class="mb-3" id="preview-container" style="display: none;">
                        <label class="form-label"><strong>Preview Bukti Transfer</strong></label>
                        <div>
                            <img id="preview-image" src="#" alt="Preview Bukti Transfer"
                                style="max-height: 200px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload"></i> Kirim Bukti Pembayaran
                        </button>
                        <a href="{{ route('member.pembayaran.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
