<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $school->nama_sekolah }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .berita-container {
            max-height: 400px;
            overflow-y: scroll;
        }
        .berita-item {
            display: flex;
            margin-bottom: 20px;
        }
        .berita-item img {
            max-width: 100px;
            margin-right: 20px;
        }
        .berita-item .berita-content {
            flex: 1;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <div class="container">
        <!-- Bagian Paling Atas: Nama Sekolah -->
        <h1>{{ $school->nama_sekolah }}</h1>

        <!-- Carousel untuk Gambar Sekolah -->
        <div id="schoolCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @if($images->count())
                    @foreach($images as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('assets/' . $image->gambar) }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active">
                        <img src="{{ asset('path/to/default/image.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                @endif
            </div>
            <a class="carousel-control-prev" href="#schoolCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#schoolCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="row mt-4">
            <!-- Bagian Bawah Kiri: Berita dan Gambar Berita -->
            <div class="col-md-8 berita-container">
                <h3>Berita Sekolah</h3>
                @if($news->count())
                    @foreach($news as $berita)
                        <div class="berita-item">
                            @if($berita->images->count())
                                @foreach($berita->images as $beritaImage)
                                    <img src="{{ asset('assets/' . $beritaImage->gambar) }}" alt="Gambar Berita">
                                @endforeach
                            @endif
                            <div class="berita-content">
                                <h4><a href="{{ route('berita.show', $berita->id) }}">{{ $berita->title }}</a></h4>
                                <p>{{ $berita->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Tidak ada berita tersedia.</p>
                @endif
            </div>

            <!-- Bagian Bawah Kanan: Kepala Sekolah dan Gambar -->
            <div class="col-md-4">
                <h3>Kepala Sekolah</h3>
                <p>{{ $school->kepala_sekolah }}</p>
                <img src="{{ asset('assets/' . ($school->gambar_kepala_sekolah ? $school->gambar_kepala_sekolah : 'default_kepala.jpg')) }}" class="img-fluid" alt="Gambar Kepala Sekolah">
            </div>
        </div>

        <!-- Bagian Paling Bawah: Alamat, Email, dan No HP -->
        <div class="mt-4">
            <h3>Kontak Sekolah</h3>
            <p>Alamat: {{ $school->alamat }}</p>
            <p>Email: {{ $school->email }}</p>
            <p>No HP: {{ $school->no_hp }}</p>
        </div>

        <!-- Google Maps -->
        <div class="mt-4">
            <h3>Lokasi Sekolah</h3>
            <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15841.48076733336!2d110.4142924!3d-6.9655819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4af9867e327%3A0x6c3bde2676cfd1c2!2sSemarang%20Tawang!5e0!3m2!1sid!2sid!4v1721276966184!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
