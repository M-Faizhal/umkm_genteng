@extends('layouts.admin')

@section('title', 'UMKM Lists')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="fas fa-store me-2"></i>
        Manajemen UMKM
    </h1>
    <a href="{{ route('admin.lists.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>
        Tambah UMKM Baru
    </a>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">List UMKM</h5>
    </div>
    <div class="card-body">
        @if($lists->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama & Deskripsi</th>
                            <th>Kategori</th>
                            <th>Pemilik</th>
                            <th>Kontak</th>
                            <th>Tahun Berdiri</th>
                            <th>Jam Operasional</th>
                            <th>Social Media</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $list)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($list->img_lists)
                                        <img src="{{ asset('storage/' . $list->img_lists) }}" alt="{{ $list->nama }}"
                                             class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded me-3 d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-store text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <strong>{{ $list->nama }}</strong>
                                        <br>
                                        <small class="text-muted">{{ Str::limit($list->desc, 50) }}</small>
                                        @if($list->address)
                                            <br>
                                            <small class="text-info">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                {{ Str::limit($list->address, 30) }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $list->category->categories }}</span>
                            </td>
                            <td>{{ $list->owner ?? 'N/A' }}</td>
                            <td>
                                @if($list->telp)
                                    <div class="mb-1">
                                        <i class="fas fa-phone text-success me-1"></i>
                                        <small>{{ $list->telp }}</small>
                                    </div>
                                @endif
                                @if($list->email)
                                    <div>
                                        <i class="fas fa-envelope text-info me-1"></i>
                                        <small>{{ Str::limit($list->email, 20) }}</small>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($list->year)
                                    <span class="badge bg-secondary">{{ $list->year }}</span>
                                    <br>
                                    <small class="text-muted">{{ date('Y') - $list->year }} tahun</small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($list->op_hour)
                                    <small class="text-success">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ $list->op_hour }}
                                    </small>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>
                                @if($list->ig_url || $list->tiktok_url)
                                    <div class="d-flex gap-1">
                                        @if($list->ig_url)
                                            <a href="{{ $list->ig_url }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Instagram">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if($list->tiktok_url)
                                            <a href="{{ $list->tiktok_url }}" target="_blank" class="btn btn-sm btn-outline-dark" title="TikTok">
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.lists.show', $list) }}" class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.lists.edit', $list) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.lists.destroy', $list) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Ingin menghapus UMKM ini?')" title="Hapus">
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
