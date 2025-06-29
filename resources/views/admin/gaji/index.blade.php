@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-cash-stack me-2"></i>Data Gaji</h5>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Tombol Tambah --}}
        <div class="mb-3 text-end">
            <a href="{{ route('gaji.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Gaji
            </a>
        </div>

        {{-- Tabel Data Gaji --}}
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Potongan</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gajis as $gaji)
                        <tr>
                            <td>{{ $gaji->user->name }}</td>
                            <td>Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td class="fw-bold text-success">Rp {{ number_format($gaji->total, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($gaji->tanggal)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('gaji.edit', $gaji->id) }}" class="btn btn-sm btn-warning mb-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle"></i> Belum ada data gaji tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
