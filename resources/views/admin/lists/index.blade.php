@extends('layouts.admin')

@section('title', 'UMKM Lists')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="fas fa-store me-2"></i>
        UMKM Lists Management
    </h1>
    <a href="{{ route('admin.lists.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Add New UMKM
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">All UMKM Lists</h5>
    </div>
    <div class="card-body">
        @if($lists->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Owner</th>
                            <th>Contact</th>
                            <th>Year</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>
                                <strong>{{ $list->nama }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($list->desc, 40) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $list->category->categories }}</span>
                            </td>
                            <td>{{ $list->owner ?? 'N/A' }}</td>
                            <td>
                                @if($list->telp)
                                    <i class="fas fa-phone text-success me-1"></i>
                                    {{ $list->telp }}
                                @endif
                                @if($list->email)
                                    <br>
                                    <i class="fas fa-envelope text-info me-1"></i>
                                    {{ $list->email }}
                                @endif
                            </td>
                            <td>{{ $list->year ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.lists.show', $list) }}" class="btn btn-sm btn-outline-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.lists.edit', $list) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.lists.destroy', $list) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this UMKM?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $lists->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-store fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No UMKM Found</h4>
                <p class="text-muted">Start by adding your first UMKM listing</p>
                <a href="{{ route('admin.lists.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Add First UMKM
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
