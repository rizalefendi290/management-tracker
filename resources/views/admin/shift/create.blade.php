@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Input Pembagian Shift</h5>
        <a href="{{ route('shift.index') }}" class="btn btn-sm btn-outline-light">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('shift.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Karyawan</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="" disabled selected>Pilih karyawan</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Silakan pilih nama karyawan.</div>
            </div>

            <div class="mb-3">
                <label for="nama_shift" class="form-label">Nama Shift</label>
                <input type="text" name="nama_shift" id="nama_shift" class="form-control" placeholder="Contoh: Shift Pagi" required>
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" name="hari" id="hari" class="form-control" placeholder="Contoh: Senin" required>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-info text-white">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
