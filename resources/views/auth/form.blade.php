<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/random/1920x1080') no-repeat center center fixed;
            background-size: cover;
        }

        .form-box {
            max-width: 500px;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .tab-btn {
            cursor: pointer;
        }

        .nav-tabs .nav-link {
            border: none;
            border-radius: 0;
            margin-bottom: -1px;
        }

        .nav-tabs .nav-link.active {
            background-color: #007bff;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="form-box">
        <ul class="nav nav-tabs mb-4" id="formTab">
            <li class="nav-item">
                <a class="nav-link active tab-btn" data-bs-toggle="tab" href="#loginTab">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link tab-btn" data-bs-toggle="tab" href="#registerTab">Daftar</a>
            </li>
        </ul>

        <div class="tab-content">
            {{-- LOGIN FORM --}}
            <div class="tab-pane fade show active" id="loginTab">
                <form action="/login" method="POST">
                    @csrf
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    {{-- LOGOUT --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>">
                    </div>
                    @endif

                    @if ($errors->has('email') || $errors->has('password'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required/>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required/>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>

            {{-- REGISTER FORM --}}
            <div class="tab-pane fade" id="registerTab">
                <form method="POST" action="/register">
                    @csrf

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Daftar Sebagai</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');
        if (tab === 'register' && document.getElementById('registerTab')) {
            const registerTabLink = document.querySelector('a[href="#registerTab"]');
            if (registerTabLink) {
                new bootstrap.Tab(registerTabLink).show();
            }
        } else if (document.getElementById('loginTab')) {
            const loginTabLink = document.querySelector('a[href="#loginTab"]');
            if (loginTabLink) {
                new bootstrap.Tab(loginTabLink).show();
            }
        }

        @if($errors->any())
            const registerTabLink = document.querySelector('a[href="#registerTab"]');
            if (registerTabLink) {
                new bootstrap.Tab(registerTabLink).show();
            }
        @endif
    });
</script>
</body>
</html>
