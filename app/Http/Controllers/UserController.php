<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Pengguna',
            'menuAdminUser' => 'active',
            'user'          => User::orderBy('jenis_akun','asc')->get(),    
        );
        return view('admin/user/index',$data);
    }

    public function create()
    {
        $data = array(
            'title'         => 'Tambah Data Pengguna',
            'menuAdminUser' => 'active',    
        );
        return view('admin/user/create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'.'|min:3|max:100|unique:users,name',
            'jabatan' => 'required',
            'jenis_akun' => 'required',
            'password' => 'required|min:6|max:50|confirmed',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.unique' => 'Nama sudah digunakan',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jenis_akun.required' => 'Jenis akun harus dipilih',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maksimal 50 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 100 karakter',
         ]);

         $user = new User();
         $user->name       = $request->name;
         $user->jabatan    = $request->jabatan;
         $user->jenis_akun = $request->jenis_akun;
         $user->password   = Hash::make($request->password);
         $user->save();

         return redirect()->route('user')->with('success','Data pengguna berhasil ditambahkan');
    }
}
