@extends('layouts.admin')

@section('title', 'UMKM Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="fas fa-store me-2"></i>
        UMKM Details
    </h1>
    <div class="btn-group">
        <a href="{{ route('admin.lists.edit', $lists) }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>
            Edit UMKM
        </a>
        <a href="{{ route('admin.lists.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Back to List
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ $lists->nama }}</h5>
            </div>
            <div class="card-body">
                @if($lists->img_lists)
                    <img src="{{ $lists->img_lists }}" alt="{{ $lists->nama }}" class="img-fluid rounded mb-3" style="max-height: 300px;">
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td width="150"><strong>Category:</strong></td>
                                <td><span class="badge bg-primary">{{ $lists->category->categories }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Owner:</strong></td>
                                <td>{{ $lists->owner ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Year:</strong></td>
                                <td>{{ $lists->year ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td>{{ $lists->address ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td width="150"><strong>Email:</strong></td>
                                <td>{{ $lists->email ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td>{{ $lists->telp ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Operating Hours:</strong></td>
                                <td>{{ $lists->op_hour ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Created:</strong></td>
                                <td>{{ $lists->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($lists->desc)
                <div class="mt-3">
                    <h6><strong>Description:</strong></h6>
                    <p>{{ $lists->desc }}</p>
                </div>
                @endif

                @if($lists->about)
                <div class="mt-3">
                    <h6><strong>About:</strong></h6>
                    <p>{{ $lists->about }}</p>
                </div>
                @endif

                @if($lists->products)
                <div class="mt-3">
                    <h6><strong>Products/Services:</strong></h6>
                    <p>{{ $lists->products }}</p>
                </div>
                @endif

                @if($lists->full_desc)
                <div class="mt-3">
                    <h6><strong>Full Description:</strong></h6>
                    <p>{{ $lists->full_desc }}</p>
                </div>
                @endif
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
                    <a href="{{ route('admin.lists.edit', $lists) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>
                        Edit UMKM
                    </a>
                    <a href="{{ route('admin.categories.show', $lists->category) }}" class="btn btn-info">
                        <i class="fas fa-tag me-2"></i>
                        View Category
                    </a>
                    <form action="{{ route('admin.lists.destroy', $lists) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this UMKM?')">
                            <i class="fas fa-trash me-2"></i>
                            Delete UMKM
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
                @if($lists->email)
                <p><i class="fas fa-envelope text-primary me-2"></i> {{ $lists->email }}</p>
                @endif
                @if($lists->telp)
                <p><i class="fas fa-phone text-success me-2"></i> {{ $lists->telp }}</p>
                @endif
                @if($lists->address)
                <p><i class="fas fa-map-marker-alt text-danger me-2"></i> {{ $lists->address }}</p>
                @endif
                @if($lists->op_hour)
                <p><i class="fas fa-clock text-warning me-2"></i> {{ $lists->op_hour }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
