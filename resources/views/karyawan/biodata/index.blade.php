@extends('karyawan.layout')

@section('content')
<h4>Biodata Saya</h4>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if($biodata)
    <table class="table">
        <tr><th>Alamat</th><td>{{ $biodata->alamat }}</td></tr>
        <tr><th>No Telp</th><td>{{ $biodata->no_telp }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ $biodata->tanggal_lahir }}</td></tr>
        <tr><th>Jenis Kelamin</th><td>{{ $biodata->jenis_kelamin }}</td></tr>
    </table>

    <a href="{{ route('karyawan.biodata.edit', $biodata->id) }}" class="btn btn-warning">Edit</a>
@else
    <p>Biodata belum diisi.</p>
    <a href="{{ route('karyawan.biodata.create') }}" class="btn btn-primary">Isi Biodata</a>
@endif
@endsection
