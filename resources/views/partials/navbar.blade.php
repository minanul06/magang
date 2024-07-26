<div class="bg-primary text-white py-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-white" href="#">Portal Sekolah</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user_sekolah.index', ['jenjang' => 'sd']) }}">SD</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user_sekolah.index', ['jenjang' => 'smp']) }}">SMP</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
