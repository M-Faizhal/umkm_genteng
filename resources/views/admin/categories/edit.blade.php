@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>
                    Edit Category
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.update', $categories) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="categories" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('categories') is-invalid @enderror"
                               id="categories" name="categories" value="{{ old('categories', $categories->categories) }}"
                               placeholder="Enter category name" required>
                        @error('categories')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Update Category
                        </button>
                        <a href="{{ route('admin.categories.show', $categories) }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>
                            Cancel
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
                    Category Info
                </h5>
            </div>
            <div class="card-body">
                <p><strong>Current name:</strong> {{ $categories->categories }}</p>
                <p><strong>Total UMKM:</strong> {{ $categories->lists->count() }} listings</p>
                <p><strong>Created:</strong> {{ $categories->created_at->format('d M Y') }}</p>
                <p><strong>Last updated:</strong> {{ $categories->updated_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
