@extends('layouts.frontend')

@section('title', 'Pencarian UMKM - UMKM Genteng')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Pencarian</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <h1 class="h2 fw-bold mb-3">Hasil Pencarian</h1>
            @if($query || $categoryId)
                <p class="text-muted">
                    Menampilkan {{ $lists->total() }} hasil untuk:
                    @if($query)
                        <strong>"{{ $query }}"</strong>
                    @endif
                    @if($categoryId)
                        @php
                            $selectedCategory = $categories->find($categoryId);
                        @endphp
                        @if($selectedCategory)
                            dalam kategori <strong>{{ $selectedCategory->categories }}</strong>
                        @endif
                    @endif
                </p>
            @else
                <p class="text-muted">Gunakan form pencarian untuk menemukan UMKM yang Anda cari</p>
            @endif
        </div>
        <div class="col-lg-4 text-lg-end">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('search') }}" method="GET" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Cari UMKM</label>
                            <input type="text" class="form-control" name="q"
                                   value="{{ $query }}"
                                   placeholder="Nama UMKM, produk, atau layanan...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Kategori</label>
                            <select name="category" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            {{ $categoryId == $category->id ? 'selected' : '' }}>
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

    <!-- Search Results -->
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

                            <h5 class="card-title">
                                @if($query)
                                    {!! str_ireplace($query, '<mark>' . $query . '</mark>', $umkm->nama) !!}
                                @else
                                    {{ $umkm->nama }}
                                @endif
                            </h5>

                            <p class="card-text text-muted">
                                @if($query && $umkm->desc)
                                    {!! str_ireplace($query, '<mark>' . $query . '</mark>', Str::limit($umkm->desc, 100)) !!}
                                @else
                                    {{ Str::limit($umkm->desc, 100) }}
                                @endif
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
                    @if($query || $categoryId)
                        <i class="fas fa-search fa-5x text-muted mb-4"></i>
                        <h3 class="text-muted mb-3">Tidak ada hasil ditemukan</h3>
                        <p class="text-muted mb-4">
                            Tidak ada UMKM yang sesuai dengan kriteria pencarian Anda.
                            <br>Coba gunakan kata kunci yang berbeda atau ubah kategori.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('search') }}" class="btn btn-outline-primary">
                                Cari Lagi
                            </a>
                            <a href="{{ route('all.umkm') }}" class="btn btn-primary">
                                Lihat Semua UMKM
                            </a>
                        </div>
                    @else
                        <i class="fas fa-search fa-5x text-muted mb-4"></i>
                        <h3 class="text-muted mb-3">Mulai Pencarian</h3>
                        <p class="text-muted mb-4">
                            Masukkan kata kunci atau pilih kategori untuk mencari UMKM yang Anda inginkan.
                        </p>
                        <a href="{{ route('all.umkm') }}" class="btn btn-primary">
                            Lihat Semua UMKM
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

@push('styles')
<style>
mark {
    background-color: #fff3cd;
    padding: 2px 4px;
    border-radius: 3px;
}
</style>
@endpush
@endsection
