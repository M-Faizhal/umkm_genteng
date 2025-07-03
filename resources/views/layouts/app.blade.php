<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Genteng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .welcome-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
        }
        .welcome-icon {
            font-size: 4rem;
            color: #667eea;
            margin-bottom: 1rem;
        }
        .welcome-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .welcome-subtitle {
            color: #7f8c8d;
            margin-bottom: 2rem;
        }
        .btn-admin {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 15px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-admin:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
            color: white;
        }
        .feature-list {
            text-align: left;
            margin-top: 2rem;
        }
        .feature-list li {
            margin-bottom: 0.5rem;
            color: #5a6c7d;
        }
        .feature-list i {
            color: #27ae60;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <div class="welcome-icon">
            <i class="fas fa-store"></i>
        </div>
        <h1 class="welcome-title">Welcome to UMKM Genteng</h1>
        <p class="welcome-subtitle">
            Manage your UMKM (Usaha Mikro Kecil Menengah) listings with our comprehensive admin panel
        </p>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-admin">
            <i class="fas fa-tachometer-alt me-2"></i>
            Go to Admin Dashboard
        </a>

        <ul class="feature-list list-unstyled">
            <li><i class="fas fa-check"></i> Manage UMKM Categories</li>
            <li><i class="fas fa-check"></i> Add & Edit UMKM Listings</li>
            <li><i class="fas fa-check"></i> User Management</li>
            <li><i class="fas fa-check"></i> Dashboard Analytics</li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
