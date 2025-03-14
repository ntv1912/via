<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang chủ')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar { width: 250px; background: #f8f9fa; padding: 20px; }
        .content { flex: 1; padding: 20px; }
        .footer { background: #343a40; color: white; text-align: center; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    @include('layouts.header')
    <div class="d-flex">
        @include('layouts.sidebar')
        <div class="content">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>
