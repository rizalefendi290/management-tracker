@extends('karyawan.layout')

@section('content')
<h4>Daftar Berkas Saya</h4>

<a href="{{ route('karyawan.berkas.create') }}" class="btn btn-success mb-3">+ Upload Berkas</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Berkas</th>
            <th>File</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($berkas as $file)
        <tr>
            <td>{{ $file->nama_berkas }}</td>
            <td>{{ basename($file->file_path) }}</td>
            <td>
                
                <form action="{{ route('karyawan.berkas.destroy', $file->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3">Belum ada berkas.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
