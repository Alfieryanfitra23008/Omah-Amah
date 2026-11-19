<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('welcome'); // Sesuaikan dengan nama file login kamu (misal: welcome.blade.php)
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan Auth
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
        }

        $request->session()->regenerate();
        $user = Auth::user();

        // Cek Role dan arahkan ke halaman yang sesuai
        if ($user->role === 'admin' || $user->role === 'super_admin') {
            return redirect()->route('dashboard');
        }

        // Default untuk Penghuni
        return redirect()->route('user.dashboard');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}