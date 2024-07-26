<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Sekolah</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Sistem Sekolah Semarang</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In minus vero explicabo? Iusto qui, omnis deleniti rem consectetur, magni explicabo quasi, nostrum iure saepe vitae aspernatur reprehenderit laudantium expedita inventore!</p>
                <a href="#" class="cta-button">Selengkapnya</a>
            </div>
        </div>
    </div>

    <section class="users py-5">
        <div class="container">
            <h2 class="text-center">Pengguna Portal Sekolah</h2>
            <div class="row text-center">
                <div class="col-md-4 stat">
                    <h3>400</h3>
                    <p>SD</p>
                </div>
                <div class="col-md-4 stat">
                    <h3>500</h3>
                    <p>SMP</p>
                </div>
                <div class="col-md-4 stat">
                    <h3>100+</h3>
                    <p>SMA</p>
                </div>
            </div>
            <marquee>
                <div class="text-center mt-4">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 1">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 2">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 3">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 4">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 5">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 6">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 7">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 8">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 9">
                <img src="{{ asset('assets/img/logomarquee.jpg') }}" alt="Logo 10">
                    <!-- Tambah lebih banyak logo sesuai kebutuhan -->
                </div>
            </marquee>
        </div>
    </section>

    <section class="solutions py-5 bg-light">
        <div class="container">
            <h2 class="text-center">Daftar Sekolah Di Kota Semarang</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">SD</h3>
                            <p class="card-text">pppppppppppp</p>
                            <div class="image-container d-flex justify-content-center mb-3">
                                <img src="assets/logosd.png" alt="Gambar SD" class="img-fluid">
                            </div>
                            <a href="#" class="btn btn-primary mt-auto">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">SMP</h3>
                            <p class="card-text">pppppppppppp</p>
                            <div class="image-container d-flex justify-content-center mb-3">
                                <img src="assets/logosmp.png" alt="Gambar SMP" class="img-fluid">
                            </div>
                            <a href="#" class="btn btn-primary mt-auto">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title">SMA</h3>
                            <p class="card-text">pppppppppppp</p>
                            <div class="image-container d-flex justify-content-center mb-3">
                                <img src="assets/logosma.png" alt="Gambar SMA" class="img-fluid">
                            </div>
                            <a href="#" class="btn btn-primary mt-auto">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
