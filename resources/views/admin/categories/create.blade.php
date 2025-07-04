@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Kategori Baru
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categories" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('categories') is-invalid @enderror"
                               id="categories" name="categories" value="{{ old('categories') }}"
                               placeholder="Masukkan nama kategori" required>
                        @error('categories')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Tambah Kategori
                        </button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Tips
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Gunakan nama yang deskriptif
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Usahakan nama kategori singkat dan jelas
                    </li>
                    {{-- <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Categories help organize UMKM listings
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
