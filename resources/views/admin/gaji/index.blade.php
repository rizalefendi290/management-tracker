@extends('admin.layout')
@section('content')
    <h4>Data Gaji</h4>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('gaji.create') }}" class="btn btn-success">Tambah Gaji</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Tabel Bootstrap --}}
    <table class="table table-bordered table-striped">
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
            @foreach($gajis as $gaji)
                <tr>
                    <td>{{ $gaji->user->name }}</td>
                    <td>{{ number_format($gaji->gaji_pokok, 2, ',', '.') }}</td>
                    <td>{{ number_format($gaji->tunjangan, 2, ',', '.') }}</td>
                    <td>{{ number_format($gaji->potongan, 2, ',', '.') }}</td>
                    <td>{{ number_format($gaji->total, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($gaji->tanggal)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('gaji.edit', $gaji->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Hapus bagian tabel versi cetak PDF dari sini --}}
@endsection