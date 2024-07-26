<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
        }
        header {
            background: #2c3e50;
            color: #ffffff;
            padding: 10px 0;
            border-bottom: #e74c3c 3px solid;
        }
        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header .navbar-nav {
            margin-left: auto;
        }
        .card {
            background: #ffffff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .btn-custom {
            font-size: 16px;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #e74c3c;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #c0392b;
        }
        .footer {
            background: #2c3e50;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fas fa-user-shield"></i> Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboardadmin') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboardadmin/viewallusersekolah') }}">View All User Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.allBerita') }}">Show All Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ url('/logoutadmin') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        @yield('content')
    </div>
    <footer class="footer">
        <p>&copy; 2024 Admin Dashboard. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
