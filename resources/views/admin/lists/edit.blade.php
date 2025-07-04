@extends('layouts.admin')

@section('title', 'Edit UMKM')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="fas fa-edit me-2"></i>
        Edit UMKM
    </h1>
    <a href="{{ route('admin.lists.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Kembali ke List UMKM
    </a>
</div>

<form action="{{ route('admin.lists.update', $list) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi UMKM</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $list->nama) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_categories" class="form-label">Kategori</label>
                        <select name="id_categories" id="id_categories" class="form-select" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $list->id_categories == $category->id ? 'selected' : '' }}>
                                    {{ $category->categories }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="owner" class="form-label">Nama Pemilik</label>
                        <input type="text" name="owner" id="owner" class="form-control" value="{{ old('owner', $list->owner) }}">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $list->year) }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $list->address) }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $list->email) }}">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Nomor HP</label>
                        <input type="text" name="telp" id="telp" class="form-control" value="{{ old('telp', $list->telp) }}">
                    </div>
                    <div class="mb-3">
                        <label for="op_hour" class="form-label">Jam Kerja</label>
                        <input type="text" name="op_hour" id="op_hour" class="form-control" value="{{ old('op_hour', $list->op_hour) }}">
                    </div>
                    <div class="mb-3">
                        <label for="img_lists" class="form-label">Image</label>
                        <input type="text" name="img_lists" id="img_lists" class="form-control" value="{{ old('img_lists', $list->img_lists) }}">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi Singkat</label>
                        <textarea name="desc" id="desc" class="form-control" rows="2">{{ old('desc', $list->desc) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="about" class="form-label">Tentang UMKM</label>
                        <textarea name="about" id="about" class="form-control" rows="2">{{ old('about', $list->about) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="products" class="form-label">Produk/Jasa</label>
                        <textarea name="products" id="products" class="form-control" rows="2">{{ old('products', $list->products) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="full_desc" class="form-label">Deskripsi Penuh</label>
                        <textarea name="full_desc" id="full_desc" class="form-control" rows="3">{{ old('full_desc', $list->full_desc) }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-2"></i>
                Simpan Perubahan
            </button>
        </div>
    </div>
</form>
@endsection