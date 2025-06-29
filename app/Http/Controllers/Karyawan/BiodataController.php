<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Validation\ValidationException;

class BiodataController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/auth')->with('error', 'Anda harus login untuk melihat biodata.');
        }

        $biodata = Biodata::where('user_id', $userId)->first();
        return view('karyawan.biodata.index', compact('biodata'));
    }

    public function create()
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/auth')->with('error', 'Anda harus login untuk mengisi biodata.');
        }

        $biodata = Biodata::where('user_id', $userId)->first();
        if ($biodata) {
            return redirect()->route('karyawan.biodata.edit', $biodata->id)
                ->with('info', 'Biodata sudah ada, silakan edit.');
        }
        return view('karyawan.biodata.create');
    }

    public function store(Request $request)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/auth')->with('error', 'Anda harus login.');
        }

        $request->validate([
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Biodata::create([
            'user_id' => $userId, // ✅ ini sudah benar
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('karyawan.biodata.index')->with('success', 'Biodata berhasil disimpan.');
    }


    public function edit($id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/auth')->with('error', 'Anda harus login.');
        }
        $biodata = Biodata::where('id', $id)->where('user_id', $userId)->firstOrFail();
        return view('karyawan.biodata.edit', compact('biodata'));
    }

    public function update(Request $request, $id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/auth')->with('error', 'Anda harus login.');
        }

        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $biodata = Biodata::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $biodata->update($validated);
        return redirect()->route('karyawan.biodata.index')->with('success', 'Biodata diperbarui.');
    }

    public function destroy($id)
    {
        $userId = session('user_id');
        if (!$userId) {
            return redirect('/auth')->with('error', 'Anda harus login.');
        }

        $biodata = Biodata::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $biodata->delete();

        return back()->with('success', 'Biodata dihapus.');
    }
}
