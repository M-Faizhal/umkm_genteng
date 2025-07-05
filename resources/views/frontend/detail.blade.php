@extends('layouts.frontend')

@section('title', $umkm->nama . ' - UMKM Genteng')
@section('description', Str::limit($umkm->desc, 160))

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category', $umkm->category->id) }}">{{ $umkm->category->categories }}</a></li>
            <li class="breadcrumb-item active">{{ $umkm->nama }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- UMKM Images -->
            <div class="mb-4">
                @php
                    $images = $umkm->getAllImages;
                @endphp

                @if(count($images) > 0)
                    <div id="umkmCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded">
                            @foreach($images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ $image }}" class="d-block w-100" alt="{{ $umkm->nama }}"
                                         style="height: 400px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>

                        @if(count($images) > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#umkmCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#umkmCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        @endif
                    </div>
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                        <i class="fas fa-image fa-5x text-muted"></i>
                    </div>
                @endif
            </div>

            <!-- UMKM Info -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="badge bg-primary fs-6">{{ $umkm->category->categories }}</span>
                        @if($umkm->year)
                            <span class="text-muted">Berdiri {{ $umkm->year }}</span>
                        @endif
                    </div>

                    <h1 class="h2 fw-bold mb-3">{{ $umkm->nama }}</h1>

                    @if($umkm->desc)
                        <p class="lead text-muted mb-4">{{ $umkm->desc }}</p>
                    @endif

                    <!-- Basic Info -->
                    <div class="row mb-4">
                        @if($umkm->owner)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted mb-1">Pemilik</h6>
                                <p class="mb-0"><i class="fas fa-user me-2 text-primary"></i>{{ $umkm->owner }}</p>
                            </div>
                        @endif

                        @if($umkm->address)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted mb-1">Alamat</h6>
                                <p class="mb-0"><i class="fas fa-map-marker-alt me-2 text-primary"></i>{{ $umkm->address }}</p>
                            </div>
                        @endif

                        @if($umkm->telp)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted mb-1">Telepon</h6>
                                <p class="mb-0">
                                    <i class="fas fa-phone me-2 text-primary"></i>
                                    <a href="tel:{{ $umkm->telp }}" class="text-decoration-none">{{ $umkm->telp }}</a>
                                </p>
                            </div>
                        @endif

                        @if($umkm->email)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted mb-1">Email</h6>
                                <p class="mb-0">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    <a href="mailto:{{ $umkm->email }}" class="text-decoration-none">{{ $umkm->email }}</a>
                                </p>
                            </div>
                        @endif

                        @if($umkm->op_hour)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted mb-1">Jam Operasional</h6>
                                <p class="mb-0"><i class="fas fa-clock me-2 text-primary"></i>{{ $umkm->op_hour }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Social Media -->
                    @if($umkm->ig_url || $umkm->tiktok_url)
                        <div class="mb-4">
                            <h6 class="text-muted mb-3">Media Sosial</h6>
                            <div class="d-flex gap-2">
                                @if($umkm->ig_url)
                                    <a href="{{ $umkm->ig_url }}" target="_blank" class="btn btn-outline-primary">
                                        <i class="fab fa-instagram me-2"></i>Instagram
                                    </a>
                                @endif

                                @if($umkm->tiktok_url)
                                    <a href="{{ $umkm->tiktok_url }}" target="_blank" class="btn btn-outline-dark">
                                        <i class="fab fa-tiktok me-2"></i>TikTok
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- About Section -->
            @if($umkm->about)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Tentang {{ $umkm->nama }}</h5>
                        <div class="card-text">{!! nl2br(e($umkm->about)) !!}</div>
                    </div>
                </div>
            @endif

            <!-- Products Section -->
            @if($umkm->products)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Produk & Layanan</h5>
                        <div class="card-text">{!! nl2br(e($umkm->products)) !!}</div>
                    </div>
                </div>
            @endif

            <!-- Full Description -->
            @if($umkm->full_desc)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi Lengkap</h5>
                        <div class="card-text">{!! nl2br(e($umkm->full_desc)) !!}</div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Quick Contact -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">Kontak Cepat</h6>
                </div>
                <div class="card-body">
                    @if($umkm->telp)
                        <a href="tel:{{ $umkm->telp }}" class="btn btn-success w-100 mb-2">
                            <i class="fas fa-phone me-2"></i>Hubungi Sekarang
                        </a>
                    @endif

                    @if($umkm->email)
                        <a href="mailto:{{ $umkm->email }}" class="btn btn-outline-primary w-100 mb-2">
                            <i class="fas fa-envelope me-2"></i>Kirim Email
                        </a>
                    @endif

                    @if($umkm->ig_url)
                        <a href="{{ $umkm->ig_url }}" target="_blank" class="btn btn-outline-primary w-100 mb-2">
                            <i class="fab fa-instagram me-2"></i>Instagram
                        </a>
                    @endif

                    @if($umkm->address)
                        <a href="https://maps.google.com/?q={{ urlencode($umkm->address) }}" target="_blank" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-map-marker-alt me-2"></i>Lihat di Peta
                        </a>
                    @endif
                </div>
            </div>

            <!-- Share -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0">Bagikan</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($umkm->nama . ' - ' . request()->url()) }}"
                           target="_blank" class="btn btn-success btn-sm">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" class="btn btn-primary btn-sm">
                            <i class="fab fa-facebook me-2"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($umkm->nama) }}&url={{ urlencode(request()->url()) }}"
                           target="_blank" class="btn btn-info btn-sm">
                            <i class="fab fa-twitter me-2"></i>Twitter
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related UMKM -->
            @if($relatedUmkm->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">UMKM Terkait</h6>
                    </div>
                    <div class="card-body">
                        @foreach($relatedUmkm as $related)
                            <div class="d-flex mb-3">
                                @if($related->img_lists)
                                    <img src="{{ asset('storage/' . $related->img_lists) }}"
                                         class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                         style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif

                                <div class="flex-grow-1">
                                    <h6 class="mb-1">
                                        <a href="{{ route('umkm.detail', $related->id) }}" class="text-decoration-none">
                                            {{ $related->nama }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ Str::limit($related->desc, 60) }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
