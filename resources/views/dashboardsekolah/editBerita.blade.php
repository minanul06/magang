@extends('dashboardsekolah.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Edit Berita</h2>
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $berita->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $berita->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea class="form-control" id="isi" name="isi" required>{{ $berita->isi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                    <div class="mt-2">
                        <label>Gambar saat ini:</label>
                        <div>
                            @foreach($berita->images as $image)
                                <div class="mb-2">
                                    <img src="{{ asset('assets/' . $image->gambar) }}" alt="{{ $berita->title }}" class="img-thumbnail" style="max-width: 100px;">
                                    <label>
                                        <input type="checkbox" name="delete_images[]" value="{{ $image->id }}"> Hapus
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Perbarui Berita</button>
                <a href="{{ route('dashboardsekolah.myBerita') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
