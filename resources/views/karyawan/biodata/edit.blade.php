@extends('karyawan.layout')

@section('content')
<h4>Edit Biodata</h4>

<form action="{{ route('karyawan.biodata.update', $biodata->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{ $biodata->alamat }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>No Telp</label>
        <input type="text" name="no_telp" value="{{ $biodata->no_telp }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ $biodata->tanggal_lahir }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select" required>
            <option value="Laki-laki" {{ $biodata->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
