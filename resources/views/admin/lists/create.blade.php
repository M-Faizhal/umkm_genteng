@extends('layouts.admin')

@section('title', 'Create UMKM')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-plus me-2"></i>
                    Tambah UMKM Baru
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.lists.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id_categories" class="form-label">Kategori</label>
                                <select class="form-select @error('id_categories') is-invalid @enderror"
                                        id="id_categories" name="id_categories" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('id_categories') == $category->id ? 'selected' : '' }}>
                                            {{ $category->categories }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_categories')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama UMKM</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                       id="nama" name="nama" value="{{ old('nama') }}"
                                       placeholder="Masukkan nama UMKM" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror"
                                  id="desc" name="desc" rows="3"
                                  placeholder="Tambahkan deskripsi singkat">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="owner" class="form-label">Pemilik</label>
                                <input type="text" class="form-control @error('owner') is-invalid @enderror"
                                       id="owner" name="owner" value="{{ old('owner') }}"
                                       placeholder="Masukkan nama pemilik">
                                @error('owner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="year" class="form-label">Tahun Berdiri</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror"
                                       id="year" name="year" value="{{ old('year') }}"
                                       placeholder="Masukkan tahun berdiri UMKM" min="1900" max="{{ date('Y') }}">
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                               id="address" name="address" value="{{ old('address') }}"
                               placeholder="Masukkan alamat UMKM">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}"
                                       placeholder="Masukkan email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('telp') is-invalid @enderror"
                                       id="telp" name="telp" value="{{ old('telp') }}"
                                       placeholder="Masukkan nomor telepon">
                                @error('telp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="op_hour" class="form-label">Jam Kerja</label>
                        <input type="text" class="form-control @error('op_hour') is-invalid @enderror"
                               id="op_hour" name="op_hour" value="{{ old('op_hour') }}"
                               placeholder="Contoh: 08:00 - 17:00">
                        @error('op_hour')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="products" class="form-label">Produk/Jasa</label>
                        <textarea class="form-control @error('products') is-invalid @enderror"
                                  id="products" name="products" rows="3"
                                  placeholder="Deskripsikan produk/jasa pada UMKM ini">{{ old('products') }}</textarea>
                        @error('products')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="about" class="form-label">Tentang UMKM</label>
                        <textarea class="form-control @error('about') is-invalid @enderror"
                                  id="about" name="about" rows="3"
                                  placeholder="Tentang UMKM">{{ old('about') }}</textarea>
                        @error('about')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="full_desc" class="form-label">Deskripsi Penuh</label>
                        <textarea class="form-control @error('full_desc') is-invalid @enderror"
                                  id="full_desc" name="full_desc" rows="5"
                                  placeholder="Tambah deskripsi penuh">{{ old('full_desc') }}</textarea>
                        @error('full_desc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="img_lists" class="form-label">Image</label>
                        <input type="text" class="form-control @error('img_lists') is-invalid @enderror"
                               id="img_lists" name="img_lists" value="{{ old('img_lists') }}"
                               placeholder="Enter image URL">
                        @error('img_lists')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Tambah UMKM
                        </button>
                        <a href="{{ route('admin.lists.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
