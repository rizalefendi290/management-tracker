@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Rekap Gaji</h5>
        <a href="{{ route('gaji.index') }}" class="btn btn-sm btn-outline-dark">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('gaji.update', $gaji->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Karyawan</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Karyawan</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $gaji->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Pilih nama karyawan terlebih dahulu.</div>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" value="{{ $gaji->gaji_pokok }}" required>
                </div>

                <div class="col-md-4">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="form-control" value="{{ $gaji->tunjangan }}" required>
                </div>

                <div class="col-md-4">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" value="{{ $gaji->potongan }}" required>
                </div>
            </div>

            <div class="mt-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $gaji->tanggal }}" required>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i> Perbarui
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
