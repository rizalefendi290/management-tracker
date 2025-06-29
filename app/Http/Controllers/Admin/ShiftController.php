<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index() {
        $shifts = Shift::with('user')->get();
        return view('admin.shift.index', compact('shifts'));
    }

    public function create() {
        $users = User::where('role', 'karyawan')->get();
        return view('admin.shift.create', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_shift' => 'required'
        ]);
        
        \App\Models\Shift::create($request->all());
        
        return redirect()->route('shift.index')->with('success', 'Shift berhasil ditambahkan.');
    }

    public function edit($id) {
        $shift = Shift::findOrFail($id);
        $users = User::where('role', 'karyawan')->get();
        return view('admin.shift.index', compact('shift', 'users'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'user_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'nama_shift' => 'required'
        ]);

        $shift = Shift::findOrFail($id);
        $shift->update($request->all());

        return redirect()->route('')->with('success', 'Data shift berhasil diperbarui.');
    }

    public function destroy($id) {
        Shift::destroy($id);
        return redirect()->route('shift.index')->with('success', 'Data shift berhasil dihapus.');
    }

}