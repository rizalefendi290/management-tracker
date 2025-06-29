@extends('karyawan.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>Biodata Saya</h5>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($biodata)
            <table class="table table-striped table-bordered">
                <tr>
                    <th class="w-25">Alamat</th>
                    <td>{{ $biodata->alamat }}</td>
                </tr>
                <tr>
                    <th>No Telp</th>
                    <td>{{ $biodata->no_telp }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ \Carbon\Carbon::parse($biodata->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ ucfirst($biodata->jenis_kelamin) }}</td>
                </tr>
            </table>

            <div class="d-flex justify-content-end">
                <a href="{{ route('karyawan.biodata.edit', $biodata->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square me-1"></i>Edit Biodata
                </a>
            </div>
        @else
            <div class="alert alert-info">Biodata belum diisi.</div>
            <a href="{{ route('karyawan.biodata.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>Isi Biodata
            </a>
        @endif

    </div>
</div>
@endsection
