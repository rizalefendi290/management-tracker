<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect('/auth')->with('error', 'Anda harus login untuk mengakses dashboard.');
        }

        if ($user->role === 'admin') {
            return view('admin.dashboard');
        } else {
            return view('karyawan.dashboard');
        }
    }
}
