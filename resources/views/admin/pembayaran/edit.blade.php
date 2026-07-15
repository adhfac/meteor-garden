@extends('layouts.app')

@section('title', 'Proses Verifikasi Pembayaran')

@section('content')
    <div>
        <h2>Proses Verifikasi Pembayaran</h2>
        <hr>

        <p>Nama Peserta: <strong>{{ $pembayaran->pendaftaran->user->nama ?? $pembayaran->pendaftaran->user->name }}</strong>
        </p>
        <p>Kelas Pilihan: <strong>{{ $pembayaran->pendaftaran->course->nama_kelas }}</strong></p>
        <p>Total Nominal: <strong>Rp {{ number_format($pembayaran->jumlah, 2, ',', '.') }}</strong></p>
        <p>Metode Pembayaran: {{ $pembayaran->metode_pembayaran }}</p>

        <div>
            <label>File Bukti Pembayaran:</label><br>
            @if($pembayaran->bukti_pembayaran && $pembayaran->bukti_pembayaran !== 'belum_upload.png')
                <a href="{{ asset('storage/bukti_transfer/' . $pembayaran->bukti_pembayaran) }}" target="_blank">
                    <img src="{{ asset('storage/bukti_transfer/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Transfer"
                        width="300" style="border: 1px solid #ccc; margin-top: 5px;"><br>
                    Klik untuk memperbesar gambar
                </a>
            @else
                <span style="color: red; font-style: italic;">Peserta belum mengunggah berkas bukti transaksi.</span>
            @endif
        </div>

        <br>
        <hr>

        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="status_verifikasi"><strong>Tindakan Status Verifikasi:</strong></label><br>
                <select name="status_verifikasi" id="status_verifikasi" required>
                    <option value="pending" {{ old('status_verifikasi', $pembayaran->status_verifikasi) == 'pending' ? 'selected' : '' }}>Pending (Tinjau Ulang)</option>
                    <option value="diterima" {{ old('status_verifikasi', $pembayaran->status_verifikasi) == 'diterima' ? 'selected' : '' }}>Diterima (Sah / Lunas)</option>
                    <option value="ditolak" {{ old('status_verifikasi', $pembayaran->status_verifikasi) == 'ditolak' ? 'selected' : '' }}>Ditolak (Bermasalah)</option>
                </select>
            </div>
            <br>

            <div>
                <label for="catatan_admin"><strong>Catatan / Alasan (Opsional):</strong></label><br>
                <textarea name="catatan_admin" id="catatan_admin" cols="50" rows="4"
                    placeholder="Contoh: Bukti transfer tidak jelas atau nominal kurang.">{{ old('catatan_admin', $pembayaran->catatan_admin) }}</textarea>
            </div>
            <br>

            <button type="submit" style="background-color: blue; color: white; padding: 5px 15px; cursor: pointer;">Simpan
                Verifikasi</button>
            <a href="{{ route('pembayaran.index') }}">Kembali</a>
        </form>
    </div>
@endsection