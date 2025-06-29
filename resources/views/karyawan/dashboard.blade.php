@extends('karyawan.layout')

@section('content')
<h4>Selamat Datang di Dashboard</h4>

{{-- Notifikasi Gaji Terbaru --}}
@if($gajiTerbaru)
    <div class="alert alert-success">
        <strong>Gaji terbaru!</strong> 
        Anda menerima gaji bulan 
        <strong>{{ \Carbon\Carbon::parse($gajiTerbaru->tanggal)->translatedFormat('F Y') }}</strong> 
        sebesar <strong>Rp {{ number_format($gajiTerbaru->total) }}</strong>.
    </div>
@else
    <div class="alert alert-warning">
        Belum ada data gaji yang tersedia untuk Anda.
    </div>
@endif

{{-- Notifikasi Shift Terbaru --}}
@if($shiftTerbaru)
    <div class="alert alert-info">
        <strong>Shift terbaru!</strong> 
        Hari: <strong>{{ $shiftTerbaru->hari }}</strong> 
        pukul <strong>{{ $shiftTerbaru->jam_mulai }} - {{ $shiftTerbaru->jam_selesai }}</strong>.
    </div>
@else
    <div class="alert alert-secondary">
        Belum ada data shift yang tersedia untuk Anda.
    </div>
@endif
@endsection
