@extends('karyawan.layout')

@section('content')
<div class="card shadow border-0">
    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
        <h5 class="mb-0">
            <i class="bi bi-person-vcard-fill me-2"></i>Profil Biodata
        </h5>
    </div>

    <div class="card-body">
        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Tampilkan Biodata --}}
        @if($biodata)
            <table class="table table-hover table-bordered mt-3">
                <tr>
                    <th style="width: 200px;">Alamat</th>
                    <td>{{ $biodata->alamat }}</td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>{{ $biodata->no_hp }}</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>{{ $biodata->tempat_lahir ?? '-' }}, 
                        {{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ ucfirst($biodata->jenis_kelamin) }}</td>
                </tr>
            </table>

            <div class="text-end mt-3">
                <a href="{{ route('karyawan.biodata.edit', $biodata->id) }}" class="btn btn-outline-warning">
                    <i class="bi bi-pencil-square me-1"></i>Ubah Biodata
                </a>
            </div>
        @else
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                <div>Biodata Anda belum diisi.</div>
            </div>
            <a href="{{ route('karyawan.biodata.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Isi Biodata Sekarang
            </a>
        @endif
    </div>
</div>
@endsection
