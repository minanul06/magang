@extends('dashboardadmin.app')

@section('title', 'Edit User Sekolah')

@section('content')
<div class="card">
    <div class="card-header">Edit User Sekolah</div>
    <div class="card-body">
        <form action="{{ url('/dashboardadmin/usersekolah/'.$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" value="{{ $user->nama_sekolah }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $user->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label for="kepala_sekolah">Kepala Sekolah</label>
                <input type="text" name="kepala_sekolah" class="form-control" value="{{ $user->kepala_sekolah }}" required>
            </div>
            <div class="form-group">
                <label for="jenjang_sekolah">Jenjang Sekolah</label>
                <input type="text" name="jenjang_sekolah" class="form-control" value="{{ $user->jenjang_sekolah }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (leave blank if not changing)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if ($user->logo)
                    <img src="{{ asset('assets/'.$user->logo) }}" alt="Logo" width="50">
                @endif
            </div>
            <div class="form-group">
                <label for="gambar_kepala_sekolah">Gambar Kepala Sekolah</label>
                <input type="file" name="gambar_kepala_sekolah" class="form-control">
                @if ($user->gambar_kepala_sekolah)
                    <img src="{{ asset('assets/'.$user->gambar_kepala_sekolah) }}" alt="Gambar Kepala Sekolah" width="50">
                @endif
            </div>
            <div class="form-group">
                <label for="sekolah_images">Upload School Images</label>
                <input type="file" name="sekolah_images[]" class="form-control" multiple>
                <div class="mt-2">
                    @foreach ($user->sekolahImages as $image)
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('assets/'.$image->gambar) }}" alt="School Image" width="50">
                            <form action="{{ url('/dashboardadmin/usersekolah/'.$user->id.'/deleteimage/'.$image->id) }}" method="POST" class="ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update User Sekolah</button>
        </form>
    </div>
</div>
<div class="mt-4">
    <a href="{{ url('/dashboardadmin/viewallusersekolah') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
