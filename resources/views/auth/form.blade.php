<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login / Daftar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://source.unsplash.com/1920x1080/?technology,workspace') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-box {
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            max-width: 500px;
            margin: 80px auto;
        }

        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 5px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(13,110,253,.25);
        }

        .input-group-text {
            background-color: #e9ecef;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .tab-content {
            margin-top: 1rem;
        }

        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-box">
        <ul class="nav nav-tabs justify-content-center" id="formTab">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#loginTab">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#registerTab">Daftar</a>
            </li>
        </ul>

        <div class="tab-content">
            {{-- Login Tab --}}
            <div class="tab-pane fade show active" id="loginTab">
                <form action="/login" method="POST" class="mt-3">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="mb-3">
                        <label>Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="********" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>

            {{-- Register Tab --}}
            <div class="tab-pane fade" id="registerTab">
                <form method="POST" action="/register" class="mt-3">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label>Nama</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" name="name" class="form-control" placeholder="Nama lengkap" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="********" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Daftar Sebagai</label>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            const tab = new bootstrap.Tab(document.querySelector('a[href="#registerTab"]'));
            tab.show();
        @endif

        const params = new URLSearchParams(window.location.search);
        if (params.get('tab') === 'register') {
            const regTab = new bootstrap.Tab(document.querySelector('a[href="#registerTab"]'));
            regTab.show();
        }
    });
</script>
</body>
</html>
