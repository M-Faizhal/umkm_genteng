@extends('layouts.frontend')

@section('title', 'Semua UMKM - UMKM Genteng')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Semua UMKM</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <h1 class="h2 fw-bold mb-3">Semua UMKM</h1>
            <p class="text-muted">Menampilkan {{ $lists->total() }} UMKM yang terdaftar</p>
        </div>
        <div class="col-lg-4 text-lg-end">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('all.umkm') }}" method="GET" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Cari UMKM</label>
                            <input type="text" class="form-control" name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Nama UMKM, produk, atau layanan...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <select name="category" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->categories }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Results Info -->
    @if(request('search') || request('category'))
        <div class="row mb-3">
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Menampilkan hasil untuk:
                    @if(request('search'))
                        <strong>"{{ request('search') }}"</strong>
                    @endif
                    @if(request('category'))
                        @php
                            $selectedCategory = $categories->find(request('category'));
                        @endphp
                        @if($selectedCategory)
                            dalam kategori <strong>{{ $selectedCategory->categories }}</strong>
                        @endif
                    @endif

                    <a href="{{ route('all.umkm') }}" class="btn btn-sm btn-outline-primary ms-2">
                        <i class="fas fa-times me-1"></i>Reset Filter
                    </a>
                </div>
            </div>
        </div>
    @endif

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
                    {{ $lists->appends(request()->query())->links() }}
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
                        @if(request('search') || request('category'))
                            Tidak ada hasil yang sesuai dengan kriteria pencarian Anda.
                        @else
                            Belum ada UMKM yang terdaftar dalam sistem.
                        @endif
                    </p>
                    <div class="d-flex justify-content-center gap-2">
                        @if(request('search') || request('category'))
                            <a href="{{ route('all.umkm') }}" class="btn btn-outline-primary">
                                Lihat Semua UMKM
                            </a>
                        @endif
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
