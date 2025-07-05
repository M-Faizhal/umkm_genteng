@extends('layouts.frontend')

@section('title', 'Kategori: ' . $category->categories . ' - UMKM Genteng')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">{{ $category->categories }}</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <h1 class="h2 fw-bold mb-3">{{ $category->categories }}</h1>
            <p class="text-muted">Menampilkan {{ $lists->total() }} UMKM dalam kategori {{ $category->categories }}</p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Search Filter -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category', $category->id) }}" method="GET" class="row g-3">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari dalam kategori {{ $category->categories }}...">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- UMKM Grid -->
    @if($lists->count() > 0)
        <div class="row">
            @foreach($lists as $umkm)
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

        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{ $lists->links() }}
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="row">
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-search fa-5x text-muted mb-4"></i>
                    <h3 class="text-muted mb-3">Tidak ada UMKM ditemukan</h3>
                    <p class="text-muted mb-4">
                        @if(request('search'))
                            Tidak ada hasil untuk pencarian "{{ request('search') }}" dalam kategori {{ $category->categories }}.
                        @else
                            Belum ada UMKM yang terdaftar dalam kategori {{ $category->categories }}.
                        @endif
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('category', $category->id) }}" class="btn btn-outline-primary">
                            Lihat Semua
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
