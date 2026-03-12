<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockOpname;

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
}
