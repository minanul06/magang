<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->title }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <div class="container mt-4">
        <h1>{{ $berita->title }}</h1>
        <p><strong>Deskripsi:</strong> {!! nl2br(e($berita->deskripsi)) !!}</p>
        <p>{!! nl2br(e($berita->isi)) !!}</p>

        @if($berita->images->count())
            <h3>Gambar Terkait:</h3>
            @foreach($berita->images as $image)
                <img src="{{ asset('assets/' . $image->gambar) }}" class="img-fluid" alt="Gambar Berita">
            @endforeach
        @endif
    </div>

    <!-- Footer -->
    @include('partials.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
