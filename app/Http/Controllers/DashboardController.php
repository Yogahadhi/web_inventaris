<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\Laporan;
use App\Models\StockOpname;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = array(
            "title"         => "Dashboard",
            "menuDashboard" => "active",
            "jumlahUser"    => User::count(),
            "jumlahAdmin"   => User::where('jenis_akun', 'Admin')->count(),
            "jumlahOperator" => User::where('jenis_akun', 'Operator')->count(),
            "jumlahDataLaporan" => Laporan::count(),
            "jumlahDataKomputer" => Komputer::count(),
            "jumlahDataStock" => StockOpname::count(),
            "jumlahKategoriKomputer" => Laporan::where('kategori', 'Komputer')->count(),
            "jumlahKategoriMonitor" => Laporan::where('kategori', 'Monitor')->count(),
            "jumlahKategoriMouse" => Laporan::where('kategori', 'Mouse')->count(),
            "jumlahKategoriKeyboard" => Laporan::where('kategori', 'Keyboard')->count(),
            "jumlahKategoriPrinter" => Laporan::where('kategori', 'Printer')->count(),
            "jumlahKategoriScanner" => Laporan::where('kategori', 'Scanner')->count(),
            "jumlahKategoriSpeaker" => Laporan::where('kategori', 'Speaker')->count(),
            "jumlahLayakPakai" => Laporan::where('kondisi', 'Layak Pakai')->count(),
            "jumlahPerluPerbaikan" => Laporan::where('kondisi', 'Perlu Perbaikan')->count(),
            "jumlahRusak" => Laporan::where('kondisi', 'Rusak')->count(),
        );
 
        return view('dashboard', $data);    
    }
}
