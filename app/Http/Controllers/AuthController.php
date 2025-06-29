<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_id' => $user->id,
                'role' => $user->role,
            ]);
            return $user->role === 'admin'
                ? redirect('/admin/dashboard')
                : redirect('/karyawan/dashboard');
        }
        return redirect()->route('login.form')->with('error', 'Email atau password salah');
    }

    /**
     * Proses registrasi user baru
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role' => 'required|in:admin,karyawan',
        ]);

        // Simpan user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Simpan ke session
        session([
            'user_id' => $user->id,
            'role' => $user->role,
        ]);

        // Arahkan ke dashboard sesuai role
        return $user->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/karyawan/dashboard');
    }

    /**
     * Logout user dan kembali ke form
     */
    public function logout() {
        #return redirect()->route('login.form')->with('error', 'Email atau password salah');
        
        session()->flush();
        return redirect('/sistem')->with('success', 'Anda berhasil logout');
    }
}
