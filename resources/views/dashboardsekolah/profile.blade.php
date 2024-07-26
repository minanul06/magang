<!-- resources/views/dashboardsekolah/profile.blade.php -->
@extends('dashboardsekolah.dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Profil Sekolah</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="{{ $user->nama_sekolah }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (Biarkan kosong jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $user->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="kepala_sekolah" class="form-label">Kepala Sekolah</label>
                    <input type="text" class="form-control" id="kepala_sekolah" name="kepala_sekolah" value="{{ $user->kepala_sekolah }}" required>
                </div>
                <div class="mb-3">
                    <label for="jenjang_sekolah" class="form-label">Jenjang Sekolah</label>
                    <input type="text" class="form-control" id="jenjang_sekolah" name="jenjang_sekolah" value="{{ $user->jenjang_sekolah }}" required>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo Sekolah</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    @if($user->logo)
                        <img src="{{ asset('assets/' . $user->logo) }}" alt="Logo Sekolah" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="gambar_kepala_sekolah" class="form-label">Gambar Kepala Sekolah</label>
                    <input type="file" class="form-control" id="gambar_kepala_sekolah" name="gambar_kepala_sekolah">
                    @if($user->gambar_kepala_sekolah)
                        <img src="{{ asset('assets/' . $user->gambar_kepala_sekolah) }}" alt="Gambar Kepala Sekolah" class="img-thumbnail mt-2" width="100">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="sekolah_images" class="form-label">Upload Gambar Sekolah</label>
                    <input type="file" class="form-control" id="sekolah_images" name="sekolah_images[]" multiple>
                    <div class="mt-2">
                        @foreach ($user->sekolahImages as $image)
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('assets/'.$image->gambar) }}" alt="Gambar Sekolah" class="img-thumbnail" width="100">
                                <form action="{{ route('profile.removeimage', $image->id) }}" method="POST" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-custom">Perbarui Profil</button>
            </form>
        </div>
    </div>
@endsection
