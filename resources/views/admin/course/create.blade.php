@extends('layouts.app') @section('title', 'Buat Kelas') @section('content') <div>
        @include('partials.navbar')
        <h2>Tambah Kelas Baru</h2>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('course.store') }}" method="POST">
            @csrf
            <div>
                <label>Nama Kelas</label><br>
                <input type="text" name="nama_kelas" value="{{ old('nama_kelas') }}" required>
            </div><br>

            <div>
                <label>Deskripsi</label><br>
                <textarea name="deskripsi" rows="4" cols="40" required>{{ old('deskripsi') }}</textarea>
            </div><br>

            <div>
                <label>Harga Kelas</label><br>
                <input type="number" name="harga" step="0.01" value="{{ old('harga') }}" required>
            </div><br>

            <div>
                <label>Kapasitas</label><br>
                <input type="number" name="kapasitas" value="{{ old('kapasitas') }}" required>
            </div><br>

            <div>
                <label>Tanggal Mulai</label><br>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            </div><br>

            <div>
                <label>Tanggal Selesai</label><br>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
            </div><br>

            <div>
                <label>Status Kelas</label><br>
                <select name="status" required>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div><br>

            <button type="submit">Simpan Kelas</button>
            <a href="{{ route('course.index') }}">Batal</a>
        </form>
    </div>
@endsection