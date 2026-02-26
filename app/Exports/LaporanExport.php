<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'laporan'      => Laporan::with('user')->get(),
            'tanggal'   => now()->format('d-m-Y'),
            'jam'       => now()->format('H.i.s'),
        );
        return view('admin.laporan.excel', $data);
    }
}