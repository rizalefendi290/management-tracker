@extends('karyawan.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-upload me-2"></i>Upload Berkas</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('karyawan.berkas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Berkas --}}
            <div class="mb-3">
                <label for="nama_berkas" class="form-label">Nama Berkas</label>
                <input type="text" name="nama_berkas" id="nama_berkas" class="form-control" required>
            </div>

            {{-- File Upload --}}
            <div class="mb-3">
                <label for="file_path" class="form-label">Pilih File</label>
                <input type="file" name="file_path" id="file_path" class="form-control" required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('karyawan.berkas.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-cloud-arrow-up-fill me-1"></i> Upload Berkas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
