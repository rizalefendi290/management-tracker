<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GajiController extends Controller
{
    public function index()
    {
        $gajis = Gaji::with('user')->get();
        return view('admin.gaji.index', compact('gajis'));
    }

    public function create() {
        $users = User::where('role', 'karyawan')->get();
        return view('admin.gaji.create', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'tanggal' => 'required|date'
        ]);

        $total = $request->gaji_pokok + $request->tunjangan - $request->potongan;
            
        Gaji::create([
            'user_id' => $request->user_id,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total' => $total,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('gaji.index')->with('success', 'Rekap gaji berhasil disimpan.');
    }

    public function edit($id) {
        $gaji = Gaji::findOrFail($id);
        $users = User::where('role', 'karyawan')->get();

        return view('admin.gaji.edit', compact('gaji', 'users'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'required|numeric',
            'potongan' => 'required|numeric',
            'tanggal' => 'required|date'
        ]);

        $gaji = Gaji::findOrFail($id);
        $gaji->update([
            'user_id' => $request->user_id,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total' => $request->gaji_pokok + $request->tunjangan - $request->potongan,
            'tanggal' => $request->tanggal
        ]);

        return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            $gaji = Gaji::findOrFail($id); // Gunakan findOrFail untuk penanganan jika ID tidak ditemukan
            $gaji->delete();
            return back()->with('success', 'Data dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function exportPDF() {
        $gajis = Gaji::with('user')->latest()->get();
        
        $pdf = Pdf::loadView('admin.gaji.pdf', compact('gajis'));
        
        return $pdf->download('rekap_gaji.pdf');
    }
}
