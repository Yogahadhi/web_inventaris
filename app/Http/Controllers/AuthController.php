<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }
    public function loginProses(Request $request)
    {
        $request->validate([
            'name' => 'required'.'|min:3|max:100',
            'password' => 'required|min:6|max:50',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maksimal 50 karakter',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 100 karakter',
         ]);

        $data = array(
            'name'     => $request->name,
            'password' => $request->password,
        );

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard')->with('success', 'Anda Berhasil Login');
        }else{
            return redirect()->back()->with('error', 'Nama Atau Password Anda Salah');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }
}
