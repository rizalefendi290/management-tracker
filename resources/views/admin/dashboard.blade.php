@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Dashboard Admin</h2>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title mb-2"><i class="bi bi-people-fill me-2"></i>Total Karyawan</h5>
                        <h3 class="card-text">{{ $totalKaryawan }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <a href="{{ route('gaji.index') }}" class="text-decoration-none">
                <div class="card text-white bg-success shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title mb-2"><i class="bi bi-cash-coin me-2"></i>Rekap Gaji Bulan Ini</h5>
                            <h4 class="card-text">Rp {{ number_format($gajiBulanIni) }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('shift.index') }}" class="text-decoration-none">
                <div class="card text-white bg-info shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title mb-2"><i class="bi bi-calendar-week me-2"></i>Shift Bulan Ini</h5>
                            <h3 class="card-text">{{ $jumlahShift }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <div class="card text-dark bg-warning shadow h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title mb-2"><i class="bi bi-clock-history me-2"></i>Update Gaji</h5>
                        <p class="card-text fs-6">
                            @if($gajiTerakhir)
                                {{ \Carbon\Carbon::parse($gajiTerakhir->tanggal)->translatedFormat('d F Y') }}
                            @else
                                <em>Belum ada</em>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
