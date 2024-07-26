<!-- resources/views/dashboardsekolah/createNewBerita.blade.php -->
@extends('dashboardsekolah.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Buat Berita Baru</h2>
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                </div>
                <button type="submit" class="btn btn-custom">Simpan</button>
            </form>
        </div>
    </div>
@endsection
