<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
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
}
