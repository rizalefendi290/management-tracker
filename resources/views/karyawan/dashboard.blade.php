@extends('karyawan.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4"><i class="bi bi-house-door-fill me-2"></i>Selamat Datang di Dashboard</h2>

    {{-- Notifikasi Gaji Terbaru --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">
            <i class="bi bi-cash-stack me-2"></i> Informasi Gaji Terbaru
        </div>
        <div class="card-body">
            @if($gajiTerbaru)
                <p class="mb-0">
                    Anda menerima gaji bulan 
                    <strong>{{ \Carbon\Carbon::parse($gajiTerbaru->tanggal)->translatedFormat('F Y') }}</strong>
                    sebesar 
                    <strong>Rp {{ number_format($gajiTerbaru->total, 0, ',', '.') }}</strong>.
                </p>
            @else
                <p class="text-muted mb-0">Belum ada data gaji yang tersedia untuk Anda.</p>
            @endif
        </div>
    </div>

    {{-- Notifikasi Shift Terbaru --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-info text-white">
            <i class="bi bi-calendar-check-fill me-2"></i> Jadwal Shift Terbaru
        </div>
        <div class="card-body">
            @if($shiftTerbaru)
                <p class="mb-0">
                    Hari: <strong>{{ $shiftTerbaru->hari }}</strong><br>
                    Jam: <strong>{{ $shiftTerbaru->jam_mulai }} - {{ $shiftTerbaru->jam_selesai }}</strong>
                </p>
            @else
                <p class="text-muted mb-0">Belum ada data shift yang tersedia untuk Anda.</p>
            @endif
        </div>
    </div>
</div>
@endsection
