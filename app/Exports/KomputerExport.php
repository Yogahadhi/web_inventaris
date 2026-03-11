<?php

namespace App\Exports;

use App\Models\Komputer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KomputerExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'komputer' => Komputer::with('user', 'laporan')->get(),
            'tanggal'   => now()->format('d-m-Y'),
            'jam'       => now()->format('H.i.s'),
        );
        return view('admin.komputer.excel', $data);
    }
}
