@extends('dashboardadmin.app')

@section('title', 'Add New User Sekolah')

@section('content')
<div class="card">
    <div class="card-header">Add New User Sekolah</div>
    <div class="card-body">
        <form action="{{ url('/dashboardadmin/usersekolah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="kepala_sekolah">Kepala Sekolah</label>
                <input type="text" name="kepala_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenjang_sekolah">Jenjang Sekolah</label>
                <input type="text" name="jenjang_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gambar_kepala_sekolah">Gambar Kepala Sekolah</label>
                <input type="file" name="gambar_kepala_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sekolah_images">Upload School Images</label>
                <input type="file" name="sekolah_images[]" class="form-control" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Add User Sekolah</button>
        </form>
    </div>
</div>
<div class="mt-4">
    <a href="{{ url('/dashboardadmin/viewallusersekolah') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
