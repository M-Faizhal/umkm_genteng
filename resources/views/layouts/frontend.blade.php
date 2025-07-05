<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UMKM Genteng - Direktori UMKM Terlengkap')</title>
    <meta name="description" content="@yield('description', 'Temukan UMKM terbaik di Genteng dengan mudah. Direktori lengkap usaha mikro, kecil, dan menengah.')">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #f8fafc;
            --accent-color: #f59e0b;
            --text-color: #1f2937;
            --text-light: #6b7280;
            --border-color: #e5e7eb;
            --success-color: #10b981;
            --danger-color: #ef4444;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            color: var(--text-color);
            line-height: 1.6;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px rgba(0,0,0,0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .badge {
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1d4ed8 100%);
            color: white;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="1000,100 1000,0 0,100"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .search-box {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-top: 3rem;
        }

        .footer {
            background: #1f2937;
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }

        .footer a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: white;
        }

        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border-left: 4px solid var(--primary-color);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }

        .breadcrumb {
            background: transparent;
            padding: 1rem 0;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .pagination .page-link {
            color: var(--primary-color);
            border: 1px solid var(--border-color);
            padding: 0.75rem 1rem;
            margin: 0 2px;
            border-radius: 8px;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Dropdown Hover Effect */
        @media (min-width: 769px) {
            .dropdown-hover:hover .dropdown-menu {
                display: block;
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .dropdown-hover .dropdown-menu {
                display: block;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-10px);
                transition: all 0.3s ease;
                pointer-events: none;
            }

            .dropdown-hover:hover .dropdown-menu {
                pointer-events: auto;
            }
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .dropdown-header {
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 1.25rem 0.5rem;
        }        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0;
            }

            .search-box {
                margin-top: 2rem;
                padding: 1.5rem;
            }

            .card-img-top {
                height: 150px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-store me-2"></i>UMKM Genteng
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            UMKM
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('all.umkm') }}">Semua UMKM</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header">Kategori</h6></li>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="{{ route('category', $category->id) }}">{{ $category->categories }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>

                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                        <i class="fas fa-user me-1"></i>Admin
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 80px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="mb-3">
                        <i class="fas fa-store me-2"></i>UMKM Genteng
                    </h5>
                    <p class="text-muted">
                        Platform direktori UMKM terlengkap di Genteng. Temukan berbagai produk dan layanan dari pelaku UMKM lokal.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('all.umkm') }}">Semua UMKM</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}">Kontak</a></li>
                        <li><a href="{{ route('search') }}">Pencarian</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="mb-3">Kontak</h6>
                    <p class="text-muted">
                        <i class="fas fa-envelope me-2"></i>info@umkmgenteng.id<br>
                        <i class="fas fa-phone me-2"></i>+62 123 456 7890<br>
                        <i class="fas fa-map-marker-alt me-2"></i>Genteng, Jawa Timur
                    </p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="text-muted mb-0">&copy; {{ date('Y') }} UMKM Genteng. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="text-muted me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-muted me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-muted"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Prevent dropdown click on desktop, allow hover
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('.dropdown-hover .dropdown-toggle');

            if (dropdownToggle) {
                dropdownToggle.addEventListener('click', function(e) {
                    // Only prevent click on desktop (width > 768px)
                    if (window.innerWidth > 768) {
                        e.preventDefault();
                        e.stopPropagation();
                        return false;
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
