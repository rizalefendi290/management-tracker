<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Gaji;
use App\Models\Shift;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index() {
        $totalKaryawan = User::where('role', 'karyawan')->count();

        $gajiBulanIni = Gaji::whereMonth('tanggal', Carbon::now()->month)
                            ->whereYear('tanggal', Carbon::now()->year)
                            ->sum('total');

        $jumlahShift = Shift::whereMonth('created_at', Carbon::now()->month)
                            ->whereYear('created_at', Carbon::now()->year)
                            ->count();

        $gajiTerakhir = Gaji::orderBy('tanggal', 'desc')->first();
        
        return view('admin.dashboard', compact(
            'totalKaryawan',
            'gajiBulanIni',
            'jumlahShift',
            'gajiTerakhir'
        ));
    }
}
