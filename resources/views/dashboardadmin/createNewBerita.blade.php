@extends('dashboardadmin.app')

@section('title', 'Create New Berita')

@section('content')
<div class="card">
    <div class="card-body">
        <h2>Buat Berita Baru</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.storeBerita') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ old('isi') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="sekolahid" class="form-label">User Sekolah</label>
                <select class="form-control" id="sekolahid" name="sekolahid" required>
                    <option value="">Pilih User Sekolah</option>
                    @foreach($userSekolahs as $userSekolah)
                        <option value="{{ $userSekolah->id }}">{{ $userSekolah->nama_sekolah }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
