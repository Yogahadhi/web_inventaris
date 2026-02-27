<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\Laporan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    
    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new LaporanExport, 'DataLaporan_'.$filename.'.xlsx');
    }

    public function pdf(){
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'laporan' => Laporan::get(),
            'tanggal'   => now()->format('d-m-Y'),
            'jam'       => now()->format('H.i.s'),
        );

        $pdf = Pdf::loadView('admin.laporan.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataLaporan_'.$filename.'.pdf');
    }

}
