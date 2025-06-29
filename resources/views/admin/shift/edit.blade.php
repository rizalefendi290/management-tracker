@extends('admin.layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Shift Karyawan</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('shift.index') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Shift
        </a>

        <form action="{{ route('shift.update', $shift->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama Karyawan --}}
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Karyawan</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Karyawan --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $shift->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Hari --}}
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" id="hari" class="form-select" required>
                    @php
                        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    @endphp
                    @foreach($hariList as $hari)
                        <option value="{{ $hari }}" {{ $shift->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Jam Mulai --}}
            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ $shift->jam_mulai }}" class="form-control" required>
            </div>

            {{-- Jam Selesai --}}
            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" value="{{ $shift->jam_selesai }}" class="form-control" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
