<?php

namespace App\Http\Controllers;

use App\Exports\StockExport;
use App\Models\StockOpname;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StockOpnameController extends Controller
{
    public function index()
    {
        $data = array(
            'title'             => 'Stock Opname',
            'menuStockOpname'   => 'active',
            'stockopname'       => StockOpname::with('user')->get(),
        );
        return view('admin.stockopname.index',$data);
    }

    public function create(){
        $data = array(
            'title'           => 'Tambah Data Stock Opname',
            'menuStockOpname' => 'active',
            'user'            => User::get(),
        );
        return view('admin.stockopname.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'created_by' => 'required',
            'keterangan' => 'nullable',

        ],[
            'kategori.required' => 'Kategori tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'kondisi.required' => 'Kondisi tidak boleh kosong',
            'created_by.required' => 'Petugas tidak boleh kosong',
         ]);

        $stockopname = new StockOpname();
        $stockopname->kategori = $request->kategori;
        $stockopname->nama = $request->nama;
        $stockopname->jumlah = $request->jumlah;
        $stockopname->lokasi = $request->lokasi;
        $stockopname->kondisi = $request->kondisi;
        $stockopname->tanggal = $request->tanggal;
        $stockopname->created_by = $request->created_by;
        $stockopname->keterangan = $request->keterangan;

        $stockopname->save();

        return redirect()->route('stock-opname')->with('success','Data stock opname berhasil ditambahkan');
    }

    public function edit($id){
        $data = array(
            'title'           => 'Edit Data Stock Opname',
            'menuStockOpname' => 'active',
            'user'            => User::get(),
            'stockopname'     => StockOpname::with('user')->findOrFail($id),
        );
        return view('admin.stockopname.update',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'created_by' => 'required',
            'keterangan' => 'nullable',

        ],[
            'kategori.required' => 'Kategori tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'kondisi.required' => 'Kondisi tidak boleh kosong',
            'created_by.required' => 'Petugas tidak boleh kosong',
         ]);

        $stockopname = StockOpname::findOrFail($id);
        $stockopname->kategori = $request->kategori;
        $stockopname->nama = $request->nama;
        $stockopname->jumlah = $request->jumlah;
        $stockopname->lokasi = $request->lokasi;
        $stockopname->kondisi = $request->kondisi;
        $stockopname->tanggal = $request->tanggal;
        $stockopname->created_by = $request->created_by;
        $stockopname->keterangan = $request->keterangan;

        $stockopname->save();

        return redirect()->route('stock-opname')->with('success','Data stock opname berhasil diubah');
    }

    public function destroy($id){
        $stockopname = StockOpname::findOrFail($id);
        $stockopname->delete();

        return redirect()->route('stock-opname')->with('success','Data stock opname berhasil dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new StockExport, 'DataStockOpname_'.$filename.'.xlsx');
    }

    public function pdf(){
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'stockopname' => StockOpname::get(),
            'tanggal'   => now()->format('d-m-Y'),
            'jam'       => now()->format('H.i.s'),
        );

        $pdf = Pdf::loadView('admin.stockopname.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataStockOpname_'.$filename.'.pdf');
    }
}
