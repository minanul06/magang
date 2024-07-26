<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <div class="container mt-4">
        <div class="row">
            @if($schools->count())
                @foreach($schools as $school)
                    <div class="col-md-3">
                        <a href="{{ route('user_sekolah.show', $school->id) }}" class="text-decoration-none text-dark">
                            <div class="card mb-4 shadow-sm">
                                <img src="{{ asset('assets/' . ($school->logo ? $school->logo : 'default_logo.jpg')) }}" class="card-img-top" alt="School Logo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $school->nama_sekolah }}</h5>
                                    <p class="card-text text-muted">Deskripsi singkat tentang {{ $school->nama_sekolah }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <p>Tidak ada data sekolah yang ditemukan.</p>
            @endif
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
