@extends('admin.layout')

@section('content')
<h4>Dashboard Admin</h4>

<div class="row">
    <div class="col-md-3">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Karyawan</h5>
                <p class="card-text fs-4">{{ $totalKaryawan }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <a href="{{ route('gaji.index') }}" class="text-decoration-none">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Rekap Gaji Bulan Ini</h5>
                    <p class="card-text fs-5">Rp {{ number_format($gajiBulanIni) }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route ('shift.index') }}" class="text-decoration-none">
            <div class="card text-bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Shift Bulan Ini</h5>
                    <p class="card-text fs-4">{{ $jumlahShift }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Update Gaji</h5>
                <p class="card-text">
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
@endsection
