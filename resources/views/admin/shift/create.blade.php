@extends('admin.layout')

@section('content')
<h4>Input Pembagian Shift</h4>

<form action="{{ route('shift.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Karyawan</label>
        <select name="user_id" class="form-select" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Nama Shift</label>
        <input type="text" name="nama_shift" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Hari</label>
        <input type="text" name="hari" class="form-control" required placeholder="Contoh: Senin">
    </div>

    <div class="mb-3">
        <label>Jam Mulai</label>
        <input type="time" name="jam_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jam Selesai</label>
        <input type="time" name="jam_selesai" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
