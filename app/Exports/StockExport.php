<?php

namespace App\Exports;

use App\Models\StockOpname;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StockExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'stockopname'      => StockOpname::with('user')->get(),
            'tanggal'          => now()->format('d-m-Y'),
            'jam'              => now()->format('H.i.s'),
        );
        return view('admin.stockopname.excel', $data);
    }
}
