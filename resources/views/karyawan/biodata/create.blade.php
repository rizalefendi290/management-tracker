@extends('karyawan.layout')

@section('content')
<h4>Biodata</h4>

<form action="{{ route('karyawan.biodata.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>No Telp</label>
        <input type="text" name="no_telp" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
