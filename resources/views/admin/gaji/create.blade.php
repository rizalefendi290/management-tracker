@extends('admin.layout')

@section('content')
<h4>Input Rekap Gaji</h4>

<form action="{{ route('gaji.store') }}" method="POST">
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
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Potongan</label>
        <input type="number" name="potongan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
