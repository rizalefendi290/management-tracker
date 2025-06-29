@extends('karyawan.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-cash-coin me-2"></i>Rekap Gaji Saya</h4>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-primary">
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
                            <td>{{ \Carbon\Carbon::parse($gaji->tanggal)->translatedFormat('d F Y') }}</td>
                            <td>Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</td>
                            <td><strong>Rp {{ number_format($gaji->total, 0, ',', '.') }}</strong></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-1"></i> Belum ada data gaji yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
