@extends('karyawan.layout')

@section('content')
<h4>Jadwal Shift Saya</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Hari</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
        </tr>
    </thead>
    <tbody>
        @forelse($shifts as $shift)
            <tr>
                <td>{{ $shift->hari }}</td>
                <td>{{ $shift->jam_mulai }}</td>
                <td>{{ $shift->jam_selesai }}</td>
            </tr>
        @empty
            <tr><td colspan="3">Belum ada jadwal shift.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
