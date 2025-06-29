<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Gaji;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; 

class KaryawanController extends Controller
{
    public function index() {
         $userId = session('user_id');
         $gajiTerbaru = Gaji::where('user_id', $userId)->orderBy('tanggal', 'desc')->first();
         $shiftTerbaru = Shift::where('user_id', $userId)->orderBy('created_at', 'desc')->first();

    return view('karyawan.dashboard', compact('gajiTerbaru', 'shiftTerbaru'));
    }

    public function biodata()
    {
        $userId = Auth::id(); 
        if (!$userId) {
            return redirect('/login')->with('error', 'Anda harus login untuk melihat biodata.');
        }
        $biodata = Biodata::where('user_id', $userId)->first();
        return view('karyawan.biodata', compact('biodata')); 
    }

    public function storeBiodata(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect('/login')->with('error', 'Anda harus login untuk menyimpan biodata.');
        }

        try {
            $validatedData = $request->validate([
                'alamat' => 'required|string|max:255',
                'no_telp' => 'required|string|max:20',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            ]);

            Biodata::updateOrCreate(
                ['user_id' => $userId],
                [
                    'alamat' => $validatedData['alamat'],
                    'no_telp' => $validatedData['no_telp'],
                    'tanggal_lahir' => $validatedData['tanggal_lahir'],
                    'jenis_kelamin' => $validatedData['jenis_kelamin'],
                ]
            );

            return back()->with('success', 'Biodata berhasil disimpan.');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan biodata: ' . $e->getMessage())->withInput();
        }
    }
}
