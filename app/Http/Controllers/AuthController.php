<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Konselor;

class AuthController extends Controller
{
    public function Login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $siswa = Siswa::where('nis', $request->username)->first();
        if ($siswa && Hash::check($request->password, $siswa->password)) {
            session([
                'login' => true,
                'role' => 'siswa',
                'user_id' => $siswa->id,
                'nama' => $siswa->nama
            ]);
            return redirect('/siswa/dashboard');
        }

        $konselor = Konselor::where('nip', $request->username)->first();
        if ($konselor && Hash::check($request->password, $konselor->password)) {
            session([
                'login' => true,
                'role' => 'konselor',
                'user_id' => $konselor->id,
                'nama' => $konselor->nama
            ]);
            return redirect('/konselor/dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }


    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/login');
    // }
}
