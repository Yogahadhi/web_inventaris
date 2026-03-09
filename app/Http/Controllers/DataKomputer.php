<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class DataKomputer extends Controller
{
    public function index()
    {
        $data = array(
            'title'            => 'Data Komputer',
            'menuDataKomputer' => 'active',
            'komputer'         => Komputer::with('user', 'laporan')->get(),
        );
        return view('admin.komputer.index',$data);
    }

    public function create() 
    {
        $data = array(
            'title'            => 'Tambah Data Komputer',
            'menuDataKomputer' => 'active',
            'laporan'          => Laporan::where('kategori', 'Komputer')->get(),
            'user'             => User::get(),
        );
        return view('admin.komputer.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_perangkat' => 'required|unique:komputers,id_perangkat',
            'nama' => 'required',
            'merek' => 'required',
            'model' => 'required',
            'cpu' => 'required',
            'kapasitas_ram' => 'nullable',
            'jenis_ram' => 'nullable',
            'kapasitas_storage' => 'nullable',
            'jenis_storage' => 'nullable',
            'vga' => 'required',
            'jaringan' => 'required',
            'motherboard' => 'nullable',
            'psu' => 'nullable',
            'sistem_operasi' => 'required',
            'kondisi' => 'required',
            'status_teknis' => 'required',
            'tanggal' => 'required',
            'created_by' => 'required',
            'keterangan' => 'nullable',
            'fungsi_print' => 'nullable',
            'desain' => 'nullable',

        ],[
            'id_perangkat.required' => 'ID perangkat tidak boleh kosong',
            'id_perangkat.unique' => 'ID perangkat komputer ini telah tersimpan pada tabel ini, silahkan gunakan ID lain',
            'nama.required' => 'Nama tidak boleh kosong',
            'merek.required' => 'Merek tidak boleh kosong',
            'model.required' => 'Model tidak boleh kosong',
            'cpu.required' => 'CPU tidak boleh kosong',
            'vga.required' => 'VGA tidak boleh kosong',
            'jaringan.required' => 'Jaringan tidak boleh kosong',
            'psu.required' => 'PSU tidak boleh kosong',
            'sistem_operasi.required' => 'Sistem operasi tidak boleh kosong',
            'kondisi.required' => 'Kondisi tidak boleh kosong',
            'status_teknis.required' => 'Status teknis tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'created_by.required' => 'Petugas tidak boleh kosong',
         ]);

        $komputer = new Komputer();
        $komputer->id_perangkat = $request->id_perangkat;
        $komputer->nama = $request->nama;
        $komputer->merek = $request->merek;
        $komputer->model = $request->model;
        $komputer->cpu = $request->cpu;
        $komputer->kapasitas_ram = $request->kapasitas_ram ?? '-';
        $komputer->jenis_ram = $request->jenis_ram  ?? '-';
        $komputer->kapasitas_storage = $request->kapasitas_storage  ?? '-';
        $komputer->jenis_storage = $request->jenis_storage ?? '-';
        $komputer->vga = $request->vga;
        $komputer->jaringan = $request->jaringan ? implode(',', $request->jaringan) : null;
        $komputer->motherboard = $request->motherboard ?? '-';
        $komputer->psu = $request->psu  ?? '-';
        $komputer->sistem_operasi = $request->sistem_operasi;
        $komputer->kondisi = $request->kondisi;
        $komputer->status_teknis = $request->status_teknis;
        $komputer->tanggal = $request->tanggal;
        $komputer->created_by = $request->created_by;
        $komputer->keterangan = $request->keterangan;
        $komputer->fungsi_print = $request->fungsi_print;
        $komputer->desain = $request->desain;
        $komputer->save();

        return redirect()->route('komputer')->with('success','Data spesifikasi komputer berhasil ditambahkan');
    }

    public function edit($id) 
    {
        $data = array(
            'title'            => 'Edit Data Komputer',
            'menuDataKomputer' => 'active',
            'laporan'          => Laporan::where('kategori', 'Komputer')->get(),
            'user'             => User::get(),
            'komputer'         => Komputer::with('user','laporan')->findOrFail($id),
        );
        return view('admin.komputer.update',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_perangkat' => 'required|unique:komputers,id_perangkat,'.$id,
            'nama' => 'required',
            'merek' => 'required',
            'model' => 'required',
            'cpu' => 'required',
            'kapasitas_ram' => 'nullable',
            'jenis_ram' => 'nullable',
            'kapasitas_storage' => 'nullable',
            'jenis_storage' => 'nullable',
            'vga' => 'required',
            'jaringan' => 'required',
            'motherboard' => 'nullable',
            'psu' => 'nullable',
            'sistem_operasi' => 'required',
            'kondisi' => 'required',
            'status_teknis' => 'required',
            'tanggal' => 'required',
            'created_by' => 'required',
            'keterangan' => 'nullable',
            'fungsi_print' => 'nullable',
            'desain' => 'nullable',

        ],[
            'id_perangkat.required' => 'ID perangkat tidak boleh kosong',
            'id_perangkat.unique' => 'ID perangkat telah digunakan, silakan pilih ID lain',
            'nama.required' => 'Nama tidak boleh kosong',
            'merek.required' => 'Merek tidak boleh kosong',
            'model.required' => 'Model tidak boleh kosong',
            'cpu.required' => 'CPU tidak boleh kosong',
            'vga.required' => 'VGA tidak boleh kosong',
            'jaringan.required' => 'Jaringan tidak boleh kosong',
            'psu.required' => 'PSU tidak boleh kosong',
            'sistem_operasi.required' => 'Sistem operasi tidak boleh kosong',
            'kondisi.required' => 'Kondisi tidak boleh kosong',
            'status_teknis.required' => 'Status teknis tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'created_by.required' => 'Petugas tidak boleh kosong',
         ]);

        $komputer = Komputer::findOrFail($id);
        $komputer->id_perangkat = $request->id_perangkat;
        $komputer->nama = $request->nama;
        $komputer->merek = $request->merek;
        $komputer->model = $request->model;
        $komputer->cpu = $request->cpu;
        $komputer->kapasitas_ram = $request->kapasitas_ram ?? '-';
        $komputer->jenis_ram = $request->jenis_ram  ?? '-';
        $komputer->kapasitas_storage = $request->kapasitas_storage  ?? '-';
        $komputer->jenis_storage = $request->jenis_storage ?? '-';
        $komputer->vga = $request->vga;
        $komputer->jaringan = $request->jaringan ? implode(',', $request->jaringan) : null;
        $komputer->motherboard = $request->motherboard ?? '-';
        $komputer->psu = $request->psu  ?? '-';
        $komputer->sistem_operasi = $request->sistem_operasi;
        $komputer->kondisi = $request->kondisi;
        $komputer->status_teknis = $request->status_teknis;
        $komputer->tanggal = $request->tanggal;
        $komputer->created_by = $request->created_by;
        $komputer->keterangan = $request->keterangan;
        $komputer->fungsi_print = $request->fungsi_print;
        $komputer->desain = $request->desain;
        $komputer->save();

        return redirect()->route('komputer')->with('success','Data spesifikasi komputer berhasil diubah');
    }
    
}
