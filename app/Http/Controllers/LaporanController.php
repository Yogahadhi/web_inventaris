<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Laporan',
            'menuAdminLaporan' => 'active',
            'laporan'          => Laporan::with('user')->get(),    
        );
        return view('admin.laporan.index',$data);
    }

    public function create()
    {
        $data = array(
            'title'         => 'Tambah Data Laporan',
            'menuAdminLaporan' => 'active',
            'user'          => User::get(),
        );
        return view('admin.laporan.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_perangkat' => 'required',
            'nama' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'model' => 'required',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'created_by' => 'required',
            'keterangan' => 'nullable',

        ],[
            'id_perangkat.required' => 'ID Perangkat tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'kategori.required' => 'Kategori tidak boleh kosong',
            'merek.required' => 'Merek tidak boleh kosong',
            'model.required' => 'Model tidak boleh kosong',
            'kondisi.required' => 'Kondisi tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'created_by.required' => 'Petugas tidak boleh kosong',
         ]);

        $laporan = new Laporan();
        $laporan->id_perangkat = $request->id_perangkat;
        $laporan->nama = $request->nama;
        $laporan->kategori = $request->kategori;
        $laporan->merek = $request->merek;
        $laporan->model = $request->model;
        $laporan->kondisi = $request->kondisi;
        $laporan->lokasi = $request->lokasi;
        $laporan->tanggal = $request->tanggal;
        $laporan->created_by = $request->created_by;
        $laporan->keterangan = $request->keterangan;

        $laporan->save();

        return redirect()->route('laporan')->with('success','Data laporan invetaris berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = array(
            'title'         => 'Edit Data Laporan',
            'menuAdminLaporan' => 'active',
            'user'          => User::get(),
            'laporan'          => Laporan::with('user')->findOrFail($id),
        );
        return view('admin.laporan.update',$data);
    }

        public function update(Request $request, $id)
    {
        $request->validate([
            'id_perangkat' => 'required',
            'nama' => 'required',
            'kategori' => 'required',
            'merek' => 'required',
            'model' => 'required',
            'kondisi' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'created_by' => 'required',
            'keterangan' => 'nullable',

        ],[
            'id_perangkat.required' => 'ID Perangkat tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'kategori.required' => 'Kategori tidak boleh kosong',
            'merek.required' => 'Merek tidak boleh kosong',
            'model.required' => 'Model tidak boleh kosong',
            'kondisi.required' => 'Kondisi tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'created_by.required' => 'Petugas tidak boleh kosong',
         ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->id_perangkat = $request->id_perangkat;
        $laporan->nama = $request->nama;
        $laporan->kategori = $request->kategori;
        $laporan->merek = $request->merek;
        $laporan->model = $request->model;
        $laporan->kondisi = $request->kondisi;
        $laporan->lokasi = $request->lokasi;
        $laporan->tanggal = $request->tanggal;
        $laporan->created_by = $request->created_by;
        $laporan->keterangan = $request->keterangan;

        $laporan->save();
        
        return redirect()->route('laporan')->with('success','Data laporan invetaris berhasil diubah');
    }

    public function destroy($id){
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan')->with('success','Data laporan berhasil dihapus');
    }
}
