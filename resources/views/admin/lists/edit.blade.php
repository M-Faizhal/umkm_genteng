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

<form action="{{ route('admin.lists.update', $list) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ig_url" class="form-label">Instagram URL</label>
                                <input type="url" name="ig_url" id="ig_url" class="form-control" value="{{ old('ig_url', $list->ig_url) }}" placeholder="https://instagram.com/username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tiktok_url" class="form-label">TikTok URL</label>
                                <input type="url" name="tiktok_url" id="tiktok_url" class="form-control" value="{{ old('tiktok_url', $list->tiktok_url) }}" placeholder="https://tiktok.com/@username">
                            </div>
                        </div>
                    </div>                    <div class="mb-3">
                        <label for="img_lists" class="form-label">Upload Images (Maksimal 4 gambar)</label>
                        <input type="file" class="form-control @error('img_lists.*') is-invalid @enderror"
                               id="img_lists" name="img_lists[]" accept="image/*" multiple onchange="previewImages(this)">
                        <small class="form-text text-muted">Format yang didukung: JPG, PNG, GIF. Maksimal 2MB per file. Kosongkan jika tidak ingin mengubah gambar. Pilih maksimal 4 gambar.</small>
                        @error('img_lists.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Current Images -->
                        @if($list->getAllImagePaths->count() > 0)
                            <div class="mt-2">
                                <p class="mb-1"><strong>Gambar saat ini:</strong></p>
                                <div class="row">
                                    @foreach($list->getAllImages as $index => $imageUrl)
                                        <div class="col-md-3 mb-2">
                                            <img src="{{ $imageUrl }}" alt="Current Image {{ $index + 1 }}" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover;">
                                            <small class="d-block text-center mt-1">Gambar {{ $index + 1 }}</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3 row" style="display: none;">
                            <p class="mb-1"><strong>Preview gambar baru:</strong></p>
                            <!-- Previews will be added here -->
                        </div>
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

<script>
function previewImages(input) {
    const previewContainer = document.getElementById('imagePreview');
    previewContainer.innerHTML = ''; // Clear previous previews

    if (input.files && input.files.length > 0) {
        // Check if more than 4 files selected
        if (input.files.length > 4) {
            alert('Maksimal 4 gambar yang dapat dipilih!');
            input.value = ''; // Clear the input
            previewContainer.style.display = 'none';
            return;
        }

        const title = document.createElement('p');
        title.className = 'mb-1';
        title.innerHTML = '<strong>Preview gambar baru:</strong>';
        previewContainer.appendChild(title);

        previewContainer.style.display = 'block';

        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const col = document.createElement('div');
                col.className = 'col-md-3 mb-2';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';
                img.style.width = '100%';
                img.style.height = '150px';
                img.style.objectFit = 'cover';
                img.alt = `Preview ${index + 1}`;

                const label = document.createElement('small');
                label.className = 'd-block text-center mt-1';
                label.textContent = `Gambar Baru ${index + 1}`;

                col.appendChild(img);
                col.appendChild(label);
                previewContainer.appendChild(col);
            }

            reader.readAsDataURL(file);
        });
    } else {
        previewContainer.style.display = 'none';
    }
}
</script>
@endsection
