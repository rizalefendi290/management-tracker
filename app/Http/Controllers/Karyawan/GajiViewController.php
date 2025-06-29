<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;

class GajiViewController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $gajis = Gaji::where('user_id', $userId)->orderBy('tanggal', 'desc')->get();
        return view('karyawan.gaji.index', compact('gajis'));
    }
}