@extends('karyawan.layout')

@section('content')
<h4>Rekap Gaji Saya</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan</th>
            <th>Potongan</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse($gajis as $gaji)
            <tr>
                <td>{{ $gaji->tanggal }}</td>
                <td>{{ $gaji->gaji_pokok }}</td>
                <td>{{ $gaji->tunjangan }}</td>
                <td>{{ $gaji->potongan }}</td>
                <td>{{ $gaji->total }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada data gaji.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
