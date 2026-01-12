<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataKomputer extends Controller
{
    public function index()
    {
        $data = array(
            'title'         => 'Data Komputer',
            'menuDataKomputer' => 'active',
        );
        return view('admin.komputer.index',$data);
    }
}
