@extends('layouts.frontend')

@section('title', 'UMKM Genteng - Direktori UMKM Terlengkap')
@section('description', 'Temukan UMKM terbaik di Genteng dengan mudah. Direktori lengkap usaha mikro, kecil, dan menengah.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">
                        Temukan UMKM Terbaik di Genteng
                    </h1>
                    <p class="lead mb-4">
                        Jelajahi direktori lengkap usaha mikro, kecil, dan menengah yang ada di Genteng.
                        Dukung ekonomi lokal dengan produk dan layanan berkualitas.
                    </p>
                </div>
            </div>

            <!-- Search Box -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="search-box">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label text-muted mb-2">Cari UMKM</label>
                                        <input type="text" class="form-control form-control-lg"
                                               name="q" placeholder="Nama UMKM, produk, atau layanan...">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label text-muted mb-2">Kategori</label>
                                        <select name="category" class="form-select form-select-lg">
                                            <option value="">Semua Kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->categories }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-label text-muted mb-2">&nbsp;</label>
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <span class="stats-number">{{ $totalUmkm }}</span>
                    <p class="text-muted mb-0">Total UMKM</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <span class="stats-number">{{ $categories->count() }}</span>
                    <p class="text-muted mb-0">Kategori</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stats-card">
                    <span class="stats-number">100%</span>
                    <p class="text-muted mb-0">Gratis</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">Jelajahi Berdasarkan Kategori</h2>
                <p class="text-muted">Temukan UMKM berdasarkan kategori yang Anda butuhkan</p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a href="{{ route('all.umkm') }}" class="btn btn-outline-primary">
                    Lihat Semua UMKM <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 col-lg-3 mb-4">
                <a href="{{ route('category', $category->id) }}" class="text-decoration-none">
                    <div class="card text-center h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-store fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title">{{ $category->categories }}</h5>
                            <p class="text-muted small">{{ $category->lists_count }} UMKM</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured UMKM Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">UMKM Terbaru</h2>
                <p class="text-muted">Discover the latest registered UMKM in our directory</p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <a href="{{ route('all.umkm') }}" class="btn btn-outline-primary">
                    Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="row">
            @foreach($featuredLists as $umkm)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if($umkm->img_lists)
                        <img src="{{ asset('storage/' . $umkm->img_lists) }}"
                             class="card-img-top" alt="{{ $umkm->nama }}">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $umkm->category->categories }}</span>
                            @if($umkm->year)
                                <small class="text-muted">{{ $umkm->year }}</small>
                            @endif
                        </div>

                        <h5 class="card-title">{{ $umkm->nama }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($umkm->desc, 100) }}
                        </p>

                        @if($umkm->address)
                            <p class="small text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                {{ Str::limit($umkm->address, 50) }}
                            </p>
                        @endif

                        @if($umkm->owner)
                            <p class="small text-muted mb-3">
                                <i class="fas fa-user me-1"></i>
                                {{ $umkm->owner }}
                            </p>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('umkm.detail', $umkm->id) }}" class="btn btn-primary btn-sm">
                                Lihat Detail
                            </a>

                            <div class="btn-group" role="group">
                                @if($umkm->telp)
                                    <a href="tel:{{ $umkm->telp }}" class="btn btn-outline-success btn-sm" title="Telepon">
                                        <i class="fas fa-phone"></i>
                                    </a>
                                @endif

                                @if($umkm->ig_url)
                                    <a href="{{ $umkm->ig_url }}" target="_blank" class="btn btn-outline-primary btn-sm" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Dukung UMKM Lokal</h2>
                <p class="lead text-muted mb-4">
                    Dengan berbelanja di UMKM lokal, Anda turut mendukung pertumbuhan ekonomi masyarakat Genteng.
                    Mari bersama memajukan ekonomi lokal!
                </p>
                <a href="{{ route('all.umkm') }}" class="btn btn-primary btn-lg">
                    Jelajahi Semua UMKM <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
