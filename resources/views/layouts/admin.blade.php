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
            transition: background-color 0.3s ease, color 0.3s ease;
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
            transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease;
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

        /* Dark Mode Styles */
        [data-theme="dark"] {
            background-color: #1a1a1a !important;
        }

        [data-theme="dark"] body {
            background-color: #1a1a1a !important;
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .main-content {
            background-color: #1a1a1a !important;
        }

        [data-theme="dark"] .navbar {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
        }

        [data-theme="dark"] .navbar-brand,
        [data-theme="dark"] .navbar-nav .nav-link {
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .card {
            background-color: #2d3748 !important;
            color: #e0e0e0 !important;
            border: 1px solid #4a5568 !important;
        }

        [data-theme="dark"] .card-header {
            background: linear-gradient(135deg, #2b6cb0 0%, #2c5282 100%) !important;
            border-bottom: 1px solid #4a5568 !important;
        }

        [data-theme="dark"] .table {
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .table thead th {
            background-color: #1a202c !important;
            color: #e0e0e0 !important;
            border-color: #4a5568 !important;
        }

        [data-theme="dark"] .table td {
            border-color: #4a5568 !important;
        }

        [data-theme="dark"] .table-hover tbody tr:hover {
            background-color: #374151 !important;
        }

        [data-theme="dark"] .page-title {
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .alert-success {
            background-color: #065f46 !important;
            border-color: #047857 !important;
            color: #d1fae5 !important;
        }

        [data-theme="dark"] .alert-danger {
            background-color: #7f1d1d !important;
            border-color: #991b1b !important;
            color: #fecaca !important;
        }

        [data-theme="dark"] .form-control {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .form-control:focus {
            background-color: #374151 !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25) !important;
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .form-select {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .dropdown-menu {
            background-color: #2d3748 !important;
            border-color: #4a5568 !important;
        }

        [data-theme="dark"] .dropdown-item {
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .dropdown-item:hover {
            background-color: #374151 !important;
            color: #ffffff !important;
        }

        [data-theme="dark"] .text-muted {
            color: #9ca3af !important;
        }

        [data-theme="dark"] .border {
            border-color: #4a5568 !important;
        }

        /* Additional dark mode styles for better visibility */
        [data-theme="dark"] .btn-outline-primary {
            color: #60a5fa !important;
            border-color: #60a5fa !important;
        }

        [data-theme="dark"] .btn-outline-primary:hover {
            background-color: #60a5fa !important;
            border-color: #60a5fa !important;
            color: #000000 !important;
        }

        [data-theme="dark"] .btn-outline-info {
            color: #38bdf8 !important;
            border-color: #38bdf8 !important;
        }

        [data-theme="dark"] .btn-outline-info:hover {
            background-color: #38bdf8 !important;
            border-color: #38bdf8 !important;
            color: #000000 !important;
        }

        [data-theme="dark"] .btn-outline-danger {
            color: #f87171 !important;
            border-color: #f87171 !important;
        }

        [data-theme="dark"] .btn-outline-danger:hover {
            background-color: #f87171 !important;
            border-color: #f87171 !important;
            color: #000000 !important;
        }

        [data-theme="dark"] .btn-outline-success {
            color: #4ade80 !important;
            border-color: #4ade80 !important;
        }

        [data-theme="dark"] .btn-outline-success:hover {
            background-color: #4ade80 !important;
            border-color: #4ade80 !important;
            color: #000000 !important;
        }

        [data-theme="dark"] .btn-outline-warning {
            color: #fbbf24 !important;
            border-color: #fbbf24 !important;
        }

        [data-theme="dark"] .btn-outline-warning:hover {
            background-color: #fbbf24 !important;
            border-color: #fbbf24 !important;
            color: #000000 !important;
        }

        [data-theme="dark"] .btn-secondary {
            background-color: #4b5563 !important;
            border-color: #4b5563 !important;
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .btn-secondary:hover {
            background-color: #374151 !important;
            border-color: #374151 !important;
            color: #ffffff !important;
        }

        [data-theme="dark"] .pagination .page-link {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
            color: #e0e0e0 !important;
        }

        [data-theme="dark"] .pagination .page-link:hover {
            background-color: #4b5563 !important;
            border-color: #6b7280 !important;
            color: #ffffff !important;
        }

        [data-theme="dark"] .pagination .page-item.active .page-link {
            background-color: #3b82f6 !important;
            border-color: #3b82f6 !important;
        }

        [data-theme="dark"] small {
            color: #9ca3af !important;
        }

        [data-theme="dark"] .invalid-feedback {
            color: #fca5a5 !important;
        }

        [data-theme="dark"] .is-invalid {
            border-color: #ef4444 !important;
        }

        /* Theme Toggle Button */
        .theme-toggle {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .theme-toggle:hover {
            color: #495057;
        }

        [data-theme="dark"] .theme-toggle {
            color: #e0e0e0;
        }

        [data-theme="dark"] .theme-toggle:hover {
            color: #ffffff;
        }

        /* Logout button style */
        .dropdown-item.logout-btn {
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            padding: 0.5rem 1rem;
            color: inherit;
        }

        .dropdown-item.logout-btn:hover {
            background-color: #f8f9fa;
        }

        [data-theme="dark"] .dropdown-item.logout-btn:hover {
            background-color: #374151 !important;
        }

        /* Social Media Icons */
        .btn-outline-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-dark:hover {
            background-color: #212529;
            border-color: #212529;
        }

        /* Image preview styles */
        .img-thumbnail {
            border-radius: 8px;
            transition: transform 0.2s ease;
        }

        .img-thumbnail:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
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
                            <div class="nav-item me-3">
                                <button class="theme-toggle" onclick="toggleTheme()" title="Toggle Dark/Light Mode">
                                    <i id="theme-icon" class="fas fa-moon"></i>
                                </button>
                            </div>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user-circle me-1"></i>
                                    {{ Auth::user()->username }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item logout-btn" onclick="return confirm('Are you sure you want to logout?')">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
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
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        function toggleTheme() {
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');
            const currentTheme = html.getAttribute('data-theme');

            if (currentTheme === 'dark') {
                html.setAttribute('data-theme', 'light');
                themeIcon.className = 'fas fa-moon';
                localStorage.setItem('theme', 'light');
            } else {
                html.setAttribute('data-theme', 'dark');
                themeIcon.className = 'fas fa-sun';
                localStorage.setItem('theme', 'dark');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const html = document.documentElement;
            const themeIcon = document.getElementById('theme-icon');

            html.setAttribute('data-theme', savedTheme);

            if (savedTheme === 'dark') {
                themeIcon.className = 'fas fa-sun';
            } else {
                themeIcon.className = 'fas fa-moon';
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
