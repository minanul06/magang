@extends('dashboardsekolah.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="card-title">Selamat Datang di Dashboard Sekolah</h2>
                <div>
                    <a href="{{ route('berita.create') }}" class="btn btn-custom">Buat Berita Baru</a>
                    <a href="{{ route('dashboardsekolah.myBerita') }}" class="btn btn-custom">Lihat Berita Saya</a>
                </div>
            </div>

            <h2>Daftar Berita Saya</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Isi</th>
                        <th>Gambar</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beritas as $berita)
                        <tr>
                            <td>{{ $berita->title }}</td>
                            <td>{{ $berita->deskripsi }}</td>
                            <td>{{ $berita->isi }}</td>
                            <td>
                                @foreach($berita->images as $image)
                                    <img src="{{ asset('assets/' . $image->gambar) }}" alt="{{ $berita->title }}" class="img-thumbnail">
                                @endforeach
                            </td>
                            <td>{{ $berita->created_at }}</td>
                            <td>
                                <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
