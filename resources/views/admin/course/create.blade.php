@extends('layouts.app')
@section('title', 'Buat Kelas')
@section('content')
    @include('partials.navbar')

    <x-form-card title="Tambah Kelas Baru" action="{{ route('course.store') }}" submitText="Simpan Kelas"
        submitIcon="bi-plus-circle" cancelRoute="{{ route('course.index') }}">
        <div class="mb-3">
            <label class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ old('nama_kelas') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" rows="4" class="form-control" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Kelas</label>
            <input type="number" name="harga" class="form-control" step="0.01" value="{{ old('harga') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status Kelas</label>
            <select name="status" class="form-select" required>
                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
    </x-form-card>

@endsection
