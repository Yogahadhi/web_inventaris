<h2 style="text-align:center;">LAPORAN DATA SPESIFIKASI KOMPUTER</h2>
<h3 align="center">Dicetak pada tanggal: {{ $tanggal }}</h3>
<h3 align="center">Pukul: {{ $jam }}</h3>
<hr>
<table width="100%" border='1px' style="border-collapse:collapse;">
    <thead>
        <tr>
            <th width="10" align="center">No</th>
            <th width="20" align="center">ID Perangkat</th>
            <th width="20" align="center">Nama Perangkat</th>
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
        </tr>
    </thead>
    <tbody>
        @foreach ($komputer as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $item->laporan->id_perangkat }}</td>
                <td align="center">{{ $item->laporan->nama }}</td>
                <td align="center">{{ $item->laporan->merek }}</td>
                <td align="center">{{ $item->laporan->model }}</td>
                <td align="center">{{ $item->cpu }}</td>
                <td align="center">{{ $item->kapasitas_ram }}</td>
                <td align="center">{{ $item->jenis_ram }}</td>
                <td align="center">{{ $item->kapasitas_storage }}</td>
                <td align="center">{{ $item->jenis_storage }}</td>
                <td align="center">{{ $item->vga }}</td>
                <td align="center">{{ $item->jaringan }}</td>
                <td align="center">{{ $item->motherboard }}</td>
                <td align="center">{{ $item->psu }}</td>
                <td align="center">{{ $item->sistem_operasi }}</td>
                <td align="center">{{ $item->kondisi }}</td>
                <td align="center">{{ $item->status_teknis }}</td>
                <td align="center">{{ $item->tanggal }}</td>
                <td align="center">{{ $item->user->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>