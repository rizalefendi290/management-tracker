@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Input Rekap Gaji</h5>
        <a href="{{ route('gaji.index') }}" class="btn btn-sm btn-outline-light">
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

        <form action="{{ route('gaji.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Karyawan</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="" disabled selected>Pilih karyawan</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Nama karyawan wajib dipilih.</div>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" required>
                </div>
            </div>

            <div class="mt-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
