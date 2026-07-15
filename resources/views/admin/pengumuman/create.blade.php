@extends('layouts.app')
@section('title', 'Buat Pengumuman')
@section('content')
    @include('partials.navbar')

    <x-form-card title="Buat Pengumuman Baru" action="{{ route('pengumuman.store') }}" submitText="Terbitkan Pengumuman"
        submitIcon="bi-megaphone" cancelRoute="{{ route('pengumuman.index') }}">
        <div class="mb-3">
            <label class="form-label">Judul Pengumuman</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required
                placeholder="Masukkan judul pengumuman">
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Pengumuman</label>
            <textarea name="isi" rows="6" class="form-control" required placeholder="Tuliskan isi pengumuman di sini...">{{ old('isi') }}</textarea>
        </div>
    </x-form-card>

@endsection
