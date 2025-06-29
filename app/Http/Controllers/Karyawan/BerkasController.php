<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Storage;


class BerkasController extends Controller
{
    public function index() {
        $userId = session('user_id');
        $berkas = Berkas::where('user_id', $userId)->latest()->get();
        return view('karyawan.berkas.index', compact('berkas'));
    }

    public function create() {
        return view('karyawan.berkas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_berkas' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,docx,jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('file_path')->store('berkas', 'public');

        Berkas::create([
            'user_id' => session('user_id'),
            'nama_berkas' => $request->nama_berkas,
            'file_path' => $path,
        ]);

        return redirect()->route('karyawan.berkas.index')->with('success', 'Berkas berhasil diunggah.');
    }

    public function download($id) {
        $berkas = Berkas::findOrFail($id);

        if ($berkas->user_id != session('user_id')) {
            abort(403);
        }

        //return Storage::disk('public')->download($berkas->file_path);
    }

    public function destroy($id) {
        $berkas = Berkas::findOrFail($id);

        if ($berkas->user_id != session('user_id')) {
            abort(403);
        }

        Storage::disk('public')->delete($berkas->file_path);
        $berkas->delete();

        return redirect()->route('karyawan.berkas.index')->with('success', 'Berkas dihapus.');
    }
}