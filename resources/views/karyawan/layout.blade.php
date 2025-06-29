<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Karyawan Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #343a40;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .alert {
            border-radius: 8px;
        }
        .content-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.biodata.index') }}">Biodata</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.berkas.index') }}">Berkas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.gaji.index') }}">Rekap Gaji</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('karyawan.shift.index') }}">Shift Saya</a></li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="header">
        <h1>Selamat Datang di Panel Karyawan</h1>
        <p>Kelola informasi dan data Anda dengan mudah.</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="content-card">
        @yield('content')
    </div>

    <div class="footer">
        <p>&copy; 2025 Karyawan Panel. All rights reserved.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
