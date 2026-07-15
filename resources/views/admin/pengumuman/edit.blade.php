@extends('layouts.app')
@section('title', 'Edit Pengumuman')
@section('content')
    @include('partials.navbar')

    <x-form-card title="Edit Pengumuman" action="{{ route('pengumuman.update', $pengumuman->id) }}" method="PUT"
        submitText="Simpan Perubahan" submitIcon="bi-pencil-square" cancelRoute="{{ route('pengumuman.index') }}">
        <div class="mb-3">
            <label class="form-label">Judul Pengumuman</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $pengumuman->judul) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Pengumuman</label>
            <textarea name="isi" rows="8" class="form-control" required>{{ old('isi', $pengumuman->isi) }}</textarea>
        </div>
    </x-form-card>

@endsection
