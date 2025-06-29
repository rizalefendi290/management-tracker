<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftViewController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $shifts = Shift::where('user_id', $userId)->orderBy('hari')->get();
        return view('karyawan.shift.index', compact('shifts'));
    }
}
