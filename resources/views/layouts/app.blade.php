<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Genteng - Redirecting...</title>
    <script>
        // Auto redirect to login if accessed directly
        window.location.href = "{{ route('login') }}";
    </script>
</head>
<body>
    <div style="text-align: center; padding: 50px;">
        <p>Redirecting to login...</p>
        <a href="{{ route('login') }}">Click here if not redirected automatically</a>
    </div>
</body>
</html>
