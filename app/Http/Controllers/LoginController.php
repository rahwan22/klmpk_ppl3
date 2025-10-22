<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Absensi;

class LoginController extends Controller
{
    // Form login
    public function loginForm()
    {
        return view('auth.login', ['title' => 'Login Sistem Sekolah']);
    }

    // Proses login
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect otomatis berdasarkan role
            return $this->redirectToDashboard(auth()->user()->role);
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }

}
