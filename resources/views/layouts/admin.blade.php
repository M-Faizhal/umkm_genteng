<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - UMKM Genteng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background-color: #3498db;
            color: #fff;
        }
        .main-content {
            margin-left: 0;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border-radius: 12px 12px 0 0 !important;
        }
        .stat-card {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border-radius: 12px;
        }
        .stat-card.success {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
        }
        .stat-card.info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        }
        .stat-card.warning {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #34495e;
            color: white;
            border: none;
        }
        .badge {
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 500;
        }
        .page-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="p-3">
                    <h3 class="text-white mb-4">
                        <i class="fas fa-store me-2"></i>
                        UMKM Admin
                    </h3>
                    <nav class="nav flex-column">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                            <i class="fas fa-tags me-2"></i>
                            Kategori
                        </a>
                        <a class="nav-link {{ request()->routeIs('admin.lists.*') ? 'active' : '' }}" href="{{ route('admin.lists.index') }}">
                            <i class="fas fa-list me-2"></i>
                            List UMKM
                        </a>
                        {{-- <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                            <i class="fas fa-users me-2"></i>
                            Users
                        </a> --}}
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <!-- Top Navigation -->
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow-sm mb-4">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">@yield('title', 'Admin Panel')</span>
                        <div class="navbar-nav ms-auto">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i>
                                    Admin
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
    @yield('scripts')
</body>
</html>
