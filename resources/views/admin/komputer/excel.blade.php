<table>
    <thead>
        <tr>
            <th colspan="22" align="center">Laporan Data Spesifikasi Komputer</th> 
        </tr> 
        <tr>
            <th colspan="22" align="center">Dicetak pada tanggal: {{ $tanggal }}</th> 
        </tr> 
        <tr>
            <th colspan="22" align="center">Pukul: {{ $jam }}</th> 
        </tr> 
        <tr>
            <th width="10" align="center">No</th>
            <th width="20" align="center">ID Perangkat</th>
            <th width="30" align="center">Nama Perangkat</th>
            <th width="20" align="center">Merek</th>
            <th width="20" align="center">Model</th>
            <th width="20" align="center">CPU</th>
            <th width="20" align="center">Kapasitas RAM</th>
            <th width="20" align="center">Jenis RAM</th>
            <th width="20" align="center">Kapasitas Penyimpanan</th>
            <th width="20" align="center">Jenis Penyimpanan</th>
            <th width="20" align="center">VGA</th>
            <th width="20" align="center">Jaringan</th>
            <th width="20" align="center">Motherboard</th>
            <th width="20" align="center">PSU</th>
            <th width="20" align="center">Sistem Operasi</th>
            <th width="20" align="center">Kondisi</th>
            <th width="20" align="center">Status Teknis</th>
            <th width="20" align="center">Tanggal Pengecekan</th>
            <th width="20" align="center">Petugas</th>
            <th width="40" align="center">Keterangan</th>
            <th width="40" align="center">Fungsi Print</th>
            <th width="40" align="center">Kemampuan Desain</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($komputer as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $item->laporan->id_perangkat }}</td>
                <td>{{ $item->laporan->nama }}</td>
                <td>{{ $item->laporan->merek }}</td>
                <td>{{ $item->laporan->model }}</td>
                <td>{{ $item->cpu }}</td>
                <td>{{ $item->kapasitas_ram }}</td>
                <td>{{ $item->jenis_ram }}</td>
                <td>{{ $item->kapasitas_storage }}</td>
                <td>{{ $item->jenis_storage }}</td>
                <td>{{ $item->vga }}</td>
                <td>{{ $item->jaringan }}</td>
                <td>{{ $item->motherboard }}</td>
                <td>{{ $item->psu }}</td>
                <td>{{ $item->sistem_operasi }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>{{ $item->status_teknis }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->user->name }} - {{ $item->user->jenis_akun }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->fungsi_print }}</td>
                <td>{{ $item->kemampuan_desain }}</td>
            </tr>
        @endforeach
    </tbody>
</table>