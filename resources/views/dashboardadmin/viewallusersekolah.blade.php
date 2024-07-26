@extends('dashboardadmin.app')

@section('title', 'View All User Sekolah')

@section('content')
<div class="card">
    <div class="card-header">All User Sekolah</div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ url('/dashboardadmin/usersekolah/create') }}" class="btn btn-success">Add New User Sekolah</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Sekolah</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Kepala Sekolah</th>
                    <th>Jenjang Sekolah</th>
                    <th>Logo</th>
                    <th>Gambar Kepala Sekolah</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nama_sekolah }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->kepala_sekolah }}</td>
                        <td>{{ $user->jenjang_sekolah }}</td>
                        <td><img src="{{ asset('assets/' .$user->logo) }}" alt="Logo" width="50"></td>
                        <td><img src="{{ asset('assets/' .$user->gambar_kepala_sekolah) }}" alt="Gambar Kepala Sekolah" width="50"></td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a href="{{ url('/dashboardadmin/usersekolah/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
                            <form action="{{ url('/dashboardadmin/usersekolah/'.$user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mt-4">
    <a href="{{ url('/dashboardadmin') }}" class="btn btn-secondary">Back to Dashboard</a>
</div>
@endsection
