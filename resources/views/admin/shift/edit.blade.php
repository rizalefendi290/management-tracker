@extends('admin.layout')

@section('content')
<h4>Edit Shift</h4>

<a href="{{ route('shift.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Shift</a>

<form action="{{ route('shift.update', $shift->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Karyawan</label>
        <select name="user_id" class="form-select" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $shift->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Hari</label>
        <input type="text" name="hari" value="{{ $shift->hari }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jam Mulai</label>
        <input type="time" name="jam_mulai" value="{{ $shift->jam_mulai }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jam Selesai</label>
        <input type="time" name="jam_selesai" value="{{ $shift->jam_selesai }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>
@endsection
