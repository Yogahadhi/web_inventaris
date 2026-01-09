<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockOpname extends Controller
{
    public function index()
    {
        $data = array(
            'title'             => 'Stock Opname',
            'menuStockOpname'   => 'active',
        );
        return view('admin/stockopname/index',$data);
    }
}
