@extends('karyawan.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-folder2-open me-2"></i>Daftar Berkas Saya</h4>
    <a href="{{ route('karyawan.berkas.create') }}" class="btn btn-success">
        <i class="bi bi-upload me-1"></i> Upload Berkas
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Berkas</th>
                        <th>File</th>
                        <th style="width: 120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($berkas as $file)
                    <tr>
                        <td>{{ $file->nama_berkas }}</td>
                        <td>{{ basename($file->file_path) }}</td>
                        <td>
                            <form action="{{ route('karyawan.berkas.destroy', $file->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berkas ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">
                            <i class="bi bi-exclamation-circle me-1"></i> Belum ada berkas yang diunggah.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
