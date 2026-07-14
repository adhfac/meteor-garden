@extends('layouts.app') @section('title', 'Edit Pengumuman') @section('content') <div>
        @include('partials.navbar')

        <div>
            <h2>Edit Pengumuman</h2>

            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST">
                @csrf
                @method('PUT') <div>
                    <label>Judul Pengumuman</label><br>
                    <input type="text" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required size="50">
                </div>
                <br>

                <div>
                    <label>Isi Pengumuman</label><br>
                    <textarea name="isi" rows="8" cols="50" required>{{ old('isi', $pengumuman->isi) }}</textarea>
                </div>
                <br>

                <button type="submit">Simpan Perubahan</button>
                <a href="{{ route('pengumuman.index') }}">Batal</a>
            </form>
        </div>
    </div>
@endsection