<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 40px 20px;
            background: linear-gradient(90deg, #0d6efd, #0dcaf0);
            color: white;
            border-radius: 12px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }

        .content-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .alert {
            border-radius: 8px;
        }

        .nav-link.active {
            font-weight: bold;
            color: #fff !important;
        }

        @media (max-width: 768px) {
            .header {
                padding: 30px 10px;
            }
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-person-badge-fill me-2"></i>Karyawan Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('karyawan.dashboard') ? 'active' : '' }}" href="{{ route('karyawan.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('karyawan.biodata.index') ? 'active' : '' }}" href="{{ route('karyawan.biodata.index') }}">Biodata</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('karyawan.berkas.index') ? 'active' : '' }}" href="{{ route('karyawan.berkas.index') }}">Berkas</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('karyawan.gaji.index') ? 'active' : '' }}" href="{{ route('karyawan.gaji.index') }}">Rekap Gaji</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('karyawan.shift.index') ? 'active' : '' }}" href="{{ route('karyawan.shift.index') }}">Shift Saya</a></li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm"><i class="bi bi-box-arrow-right me-1"></i>Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <div class="container mt-4">
        <div class="header">
            <h1 class="display-6">Selamat Datang di Panel Karyawan</h1>
            <p class="lead mb-0">Kelola informasi pribadi dan pekerjaan Anda di sini.</p>
        </div>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Main Content --}}
        <div class="content-card">
            @yield('content')
        </div>

        {{-- Footer --}}
        <div class="footer">
            <p class="mb-0">&copy; {{ date('Y') }} Panel Karyawan. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
