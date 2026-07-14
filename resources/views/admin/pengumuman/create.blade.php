@extends('layouts.app') @section('title', 'Buat Pengumuman') @section('content') <div>
            @include('partials.navbar')

            <div>
                <h2>Buat Pengumuman Baru</h2>



                <form action="{{ route('pengumuman.store') }}" method="POST">
                    @csrf

                    <div>
                        <label>Judul Pengumuman</label><br>
                        <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Masukkan judul pengumuman">
                    </div>
                    <br>

                    <div>
                        <label>Isi Pengumuman</label><br>
                        <textarea name="isi" rows="6" cols="50" required
                            placeholder="Tuliskan isi pengumuman di sini...">{{ old('isi') }}</textarea>
                    </div>
                    <br>

                    <button type="submit">Terbitkan Pengumuman</button>
                    <a href="{{ route('pengumuman.index') }}">Batal</a>
                </form>
            </div>
    </div>
@endsection