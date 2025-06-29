@extends('admin.layout')

@section('content')
<h4>Daftar Shift</h4>

<a href="{{ route('shift.create') }}" class="btn btn-success mb-3">+ Tambah Shift</a>
<a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-hover table-bordered">
    <thead class="table-light">
        <tr>
            <th>Nama Karyawan</th>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($shifts as $shift)
        <tr>
            <td>{{ $shift->user->name }}</td>
            <td>{{ $shift->hari }}</td>
            <td>{{ $shift->jam_mulai }} - {{ $shift->jam_selesai }}</td>
            <td>
                <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="{{ route('shift.destroy', $shift->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-4">
                <i class="bi bi-info-circle"></i> Belum ada data shift.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
