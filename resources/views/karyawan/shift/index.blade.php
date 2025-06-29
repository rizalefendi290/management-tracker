@extends('karyawan.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="bi bi-calendar2-week me-2"></i>Jadwal Shift Saya</h4>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-info">
                    <tr>
                        <th><i class="bi bi-calendar-day me-1"></i>Hari</th>
                        <th><i class="bi bi-clock me-1"></i>Jam Mulai</th>
                        <th><i class="bi bi-clock me-1"></i>Jam Selesai</th>
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
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-1"></i> Belum ada jadwal shift yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
