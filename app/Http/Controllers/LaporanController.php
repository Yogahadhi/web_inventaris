<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Laporan Inventaris',
            'menuLaporan'   => 'active',
        );
        return view('admin/laporan/index',$data);
    }
}
