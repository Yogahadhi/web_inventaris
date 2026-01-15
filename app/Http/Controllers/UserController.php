<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Pengguna',
            'menuAdminUser' => 'active',
            'user'          => User::orderBy('jenis_akun','asc')->get(),    
        );
        return view('admin.user.index',$data);
    }

    public function create()
    {
        $data = array(
            'title'         => 'Tambah Data Pengguna',
            'menuAdminUser' => 'active',    
        );
        return view('admin.user.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:users,name',
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

    public function edit($id)
    {
        $data = array(
            'title'         => 'Edit Data Pengguna',
            'menuAdminUser' => 'active',    
            'user'          => User::findOrFail($id),
        );
        return view('admin.user.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'jabatan' => 'required',
            'jenis_akun' => 'required',
            'password' => 'nullable|min:6|max:50|confirmed',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'jenis_akun.required' => 'Jenis akun harus dipilih',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maksimal 50 karakter',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 100 karakter',
         ]);

         $user = User::findOrFail($id);
         $user->name       = $request->name;
         $user->jabatan    = $request->jabatan;
         $user->jenis_akun = $request->jenis_akun;
         if ($request->filled('password')) {
            $user->password   = Hash::make($request->password);
         }
         $user->save();

         return redirect()->route('user')->with('success','Data pengguna berhasil diubah');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success','Data pengguna berhasil dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new UsersExport, 'DataUser_'.$filename.'.xlsx');
    }

    public function pdf(){
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'user' => User::get(),
            'tanggal'   => now()->format('d-m-Y'),
            'jam'       => now()->format('H.i.s'),
        );

        $pdf = Pdf::loadView('admin.user.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataUser_'.$filename.'.pdf');
    }
}
