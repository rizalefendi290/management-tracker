@extends('karyawan.layout')

@section('content')
<h4>Upload Berkas</h4>

<form action="{{ route('karyawan.berkas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama Berkas</label>
        <input type="text" name="nama_berkas" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Pilih File</label>
        <input type="file" name="file_path" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
    <a href="{{ route('karyawan.berkas.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
