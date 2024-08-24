<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function getSignup()
    {
        return view('signup');
    }
    public function getSignin()
    {
        return view('signin');
    }

    public function postSignup(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nomor_telepon' => 'required|string|max:20',
            'gender' => 'required|in:pria,wanita',
            'password' => 'required|string|min:8',
            'media' => 'nullable|string',
            'role' => 'nullable|in:admin,redaktur,wartawan,user'
        ]);

        $user = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'gender' => $request->input('gender'),
            'password' => Hash::make($request->input('password')),
            'media' => $request->input('media'),
            'role' => $request->input('role', 'user')
        ]);

        return redirect('/auth/signin');
    }

    public function postSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin');
            } elseif ($user->role == 'wartawan') {
                return redirect()->intended('/wartawan/berita');
            } elseif ($user->role == 'redaktur') {
                return redirect()->intended('/redaktur');
            } else {
                return redirect()->intended('/');
            }
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Email dan Password tidak sesuai'])
        ->withInput($request->only('email'));
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
