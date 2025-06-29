@extends('admin.layout')

@section('content')
<h4>Edit Rekap Gaji</h4>

<a href="{{ route('gaji.index') }}" class="btn btn-secondary mb-3">← Kembali ke Daftar Gaji</a>

<form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Karyawan</label>
        <select name="user_id" class="form-select" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $gaji->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Gaji Pokok</label>
        <input type="number" name="gaji_pokok" class="form-control" value="{{ $gaji->gaji_pokok }}" required>
    </div>

    <div class="mb-3">
        <label>Tunjangan</label>
        <input type="number" name="tunjangan" class="form-control" value="{{ $gaji->tunjangan }}" required>
    </div>

    <div class="mb-3">
        <label>Potongan</label>
        <input type="number" name="potongan" class="form-control" value="{{ $gaji->potongan }}" required>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ $gaji->tanggal }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>
@endsection
