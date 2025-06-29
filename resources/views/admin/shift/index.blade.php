@extends('admin.layout')

@section('content')
<h4>Daftar Shift</h4>

<a href="{{ route('shift.create') }}" class="btn btn-success mb-3">+ Tambah Shift</a>
<a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shifts as $shift)
        <tr>
            <td>{{ $shift->user->name }}</td>
            <td>{{ $shift->hari }}</td>
            <td>{{ $shift->jam_mulai }} - {{ $shift->jam_selesai }}</td>
            <td>
                <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('shift.destroy', $shift->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
