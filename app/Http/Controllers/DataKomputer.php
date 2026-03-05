<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
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
}
