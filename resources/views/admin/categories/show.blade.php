@extends('layouts.admin')

@section('title', 'Category Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="fas fa-tag me-2"></i>
        Category Details
    </h1>
    <div class="btn-group">
        <a href="{{ route('admin.categories.edit', $categories) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>
            Edit Category
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Back to List
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Category Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200"><strong>Category Name:</strong></td>
                        <td>{{ $categories->categories }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total UMKM:</strong></td>
                        <td>{{ $categories->lists->count() }} listings</td>
                    </tr>
                    <tr>
                        <td><strong>Created At:</strong></td>
                        <td>{{ $categories->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated At:</strong></td>
                        <td>{{ $categories->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.lists.create') }}?category={{ $categories->id }}" class="btn btn-success">
                        <i class="fas fa-plus me-2"></i>
                        Add UMKM to this Category
                    </a>
                    <a href="{{ route('admin.categories.edit', $categories) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>
                        Edit Category
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@if($categories->lists->count() > 0)
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">UMKM in this Category</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Contact</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories->lists as $list)
                    <tr>
                        <td>
                            <strong>{{ $list->nama }}</strong>
                            <br>
                            <small class="text-muted">{{ Str::limit($list->desc, 50) }}</small>
                        </td>
                        <td>{{ $list->owner ?? 'N/A' }}</td>
                        <td>
                            @if($list->telp)
                                <i class="fas fa-phone text-success me-1"></i>
                                {{ $list->telp }}
                            @endif
                        </td>
                        <td>{{ $list->year ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.lists.show', $list) }}" class="btn btn-sm btn-outline-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection
