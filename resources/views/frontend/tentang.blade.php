@extends('layouts.frontend')

@section('title', 'Tentang Kami - UMKM Genteng')
@section('description', 'Pelajari lebih lanjut tentang platform direktori UMKM Genteng dan misi kami untuk memajukan ekonomi lokal.')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Tentang Kami</li>
        </ol>
    </nav>

    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold mb-4">Tentang UMKM Genteng</h1>
            <p class="lead text-muted mb-4">
                Platform digital yang menghubungkan pelaku UMKM dengan masyarakat untuk memajukan ekonomi lokal Genteng
            </p>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="row mb-5">
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-eye fa-3x text-primary"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Visi Kami</h3>
                    <p class="text-muted">
                        Menjadi platform terdepan dalam mendukung pertumbuhan dan perkembangan UMKM di Genteng
                        melalui digitalisasi dan kemudahan akses informasi.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-bullseye fa-3x text-primary"></i>
                    </div>
                    <h3 class="h4 fw-bold mb-3">Misi Kami</h3>
                    <p class="text-muted">
                        Menyediakan platform yang mudah digunakan untuk memperkenalkan produk dan layanan UMKM
                        kepada masyarakat luas dan meningkatkan daya saing usaha lokal.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Content -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="h3 fw-bold mb-4">Mengapa UMKM Genteng?</h2>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <i class="fas fa-check-circle text-success fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Gratis 100%</h5>
                                    <p class="text-muted small">Platform ini sepenuhnya gratis untuk semua pelaku UMKM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <i class="fas fa-users text-success fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Komunitas Lokal</h5>
                                    <p class="text-muted small">Fokus pada pengembangan ekonomi lokal Genteng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <i class="fas fa-mobile-alt text-success fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Mudah Diakses</h5>
                                    <p class="text-muted small">Dapat diakses melalui berbagai perangkat dengan mudah</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <i class="fas fa-search text-success fs-5"></i>
                                </div>
                                <div>
                                    <h5 class="mb-2">Pencarian Mudah</h5>
                                    <p class="text-muted small">Fitur pencarian canggih untuk menemukan UMKM yang tepat</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h4 fw-bold mb-3">Komitmen Kami</h3>
                    <p class="text-muted mb-4">
                        Kami berkomitmen untuk terus mengembangkan platform ini sebagai solusi terbaik bagi pelaku UMKM
                        di Genteng. Dengan dukungan teknologi modern dan pemahaman mendalam tentang kebutuhan lokal,
                        kami percaya dapat memberikan nilai tambah yang signifikan bagi pertumbuhan ekonomi daerah.
                    </p>

                    <p class="text-muted">
                        Melalui UMKM Genteng, kami berharap dapat menciptakan ekosistem yang sehat dimana pelaku usaha
                        dapat berkembang dan masyarakat dapat dengan mudah mengakses produk serta layanan berkualitas
                        dari UMKM lokal.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card bg-primary text-white border-0">
                <div class="card-body p-5">
                    <div class="row text-center">
                        <div class="col-md-3 mb-4">
                            <h2 class="display-4 fw-bold mb-2">{{ \App\Models\Lists::count() }}</h2>
                            <p class="mb-0">UMKM Terdaftar</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <h2 class="display-4 fw-bold mb-2">{{ \App\Models\Categories::count() }}</h2>
                            <p class="mb-0">Kategori Usaha</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <h2 class="display-4 fw-bold mb-2">100%</h2>
                            <p class="mb-0">Gratis</p>
                        </div>
                        <div class="col-md-3 mb-4">
                            <h2 class="display-4 fw-bold mb-2">24/7</h2>
                            <p class="mb-0">Akses Online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row">
        <div class="col-12 text-center">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="h3 fw-bold mb-3">Siap Bergabung?</h2>
                    <p class="text-muted mb-4">
                        Jelajahi berbagai UMKM yang ada di Genteng dan dukung ekonomi lokal dengan berbelanja dari mereka.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('all.umkm') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-store me-2"></i>Jelajahi UMKM
                        </a>
                        <a href="{{ route('kontak') }}" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-envelope me-2"></i>Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
