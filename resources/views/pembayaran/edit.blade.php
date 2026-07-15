@extends('layouts.app')

@section('title', 'Upload Bukti Pembayaran')

@section('content')
    <div>
        @include('partials.navbar1')

        <h2>Konfirmasi Pembayaran Kelas: {{ $pembayaran->pendaftaran->course->nama_kelas }}</h2>
        <p>Total yang harus dibayar: <strong>Rp {{ number_format($pembayaran->jumlah, 2, ',', '.') }}</strong></p>
        <hr>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('member.pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="metode_pembayaran">Metode Pembayaran:</label><br>
                <select name="metode_pembayaran" id="metode_pembayaran" required>
                    <option value="">-- Pilih Bank / E-Wallet --</option>
                    <option value="Transfer Bank Mandiri" {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Transfer Bank Mandiri' ? 'selected' : '' }}>Transfer Bank Mandiri
                    </option>
                    <option value="Transfer Bank BCA" {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Transfer Bank BCA' ? 'selected' : '' }}>Transfer Bank BCA</option>
                    <option value="Dana / Gopay" {{ old('metode_pembayaran', $pembayaran->metode_pembayaran) == 'Dana / Gopay' ? 'selected' : '' }}>Dana / Gopay</option>
                </select>
            </div>
            <br>

            <div>
                <label for="bukti_pembayaran">Pilih File Bukti Transfer (Format: JPG, PNG. Max: 2MB):</label><br>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" required>
            </div>
            <br><br>

            <button type="submit">Kirim Bukti Pembayaran</button>
            <a href="{{ route('member.pembayaran.index') }}">Batal</a>
        </form>
    </div>
@endsection