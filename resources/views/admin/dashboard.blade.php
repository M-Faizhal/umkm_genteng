@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Stats Cards -->
    <div class="col-md-3 mb-4">
        <div class="card stat-card info">
            <div class="card-body text-center">
                <i class="fas fa-tags fa-3x mb-3"></i>
                <h3 class="mb-0">{{ $totalCategories }}</h3>
                <p class="mb-0">Kategori</p>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card stat-card success">
            <div class="card-body text-center">
                <i class="fas fa-store fa-3x mb-3"></i>
                <h3 class="mb-0">{{ $totalLists }}</h3>
                <p class="mb-0">Jumlah UMKM</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="card stat-card">
            <div class="card-body text-center">
                <i class="fas fa-chart-line fa-3x mb-3"></i>
                <h3 class="mb-0">{{ number_format($totalLists / max($totalCategories, 1), 1) }}</h3>
                <p class="mb-0">Rata-Rata UMKM per Kategori</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent UMKM Lists -->
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-clock me-2"></i>
                    UMKM Terbaru
                </h5>
            </div>
            <div class="card-body">
                @if($recentLists->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Pemilik</th>
                                    <th>Dibuat pada tanggal</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentLists as $list)
                                <tr>
                                    <td>
                                        <strong>{{ $list->nama }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($list->desc, 50) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $list->category->categories }}</span>
                                    </td>
                                    <td>{{ $list->owner ?? 'N/A' }}</td>
                                    <td>{{ $list->created_at->format('d M Y') }}</td>
                                    {{-- <td>
                                        <a href="{{ route('admin.lists.show', $list) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No UMKM lists found</p>
                        <a href="{{ route('admin.lists.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            Add First UMKM
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>
                    Aksi Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-3">
                    <a href="{{ route('admin.lists.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Tambah UMKM Baru
                    </a>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">
                        <i class="fas fa-tag me-2"></i>
                        Tambah Kategori Baru
                    </a>
                    {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-warning">
                        <i class="fas fa-user-plus me-2"></i>
                        Add User
                    </a> --}}
                </div>
            </div>
        </div>

        <!-- System Info -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    System Info
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-calendar text-primary me-2"></i>
                        <strong>Tanggal:</strong> {{ date('d M Y') }}
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-clock text-info me-2"></i>
                        <strong>Waktu:</strong> {{ date('H:i:s') }}
                    </li>
                    {{-- <li class="mb-2">
                        <i class="fas fa-server text-success me-2"></i>
                        <strong>Laravel:</strong> {{ app()->version() }}
                    </li>
                    <li>
                        <i class="fas fa-database text-warning me-2"></i>
                        <strong>Database:</strong> Connected
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
