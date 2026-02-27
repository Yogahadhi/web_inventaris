<h3 align="center">Data Laporan Inventaris</h3>
<h3 align="center">Dicetak pada tanggal: {{ $tanggal }}</h3>
<h3 align="center">Pukul: {{ $jam }}</h3>
<hr>
<table width="100%" border='1px' style="border-collapse:collapse;">
    <thead>
        <tr>
            <th width="10" align="center">No</th>
            <th width="20" align="center">ID Perangkat</th>
            <th width="30" align="center">Nama Perangkat</th>
            <th width="20" align="center">Kategori</th>
            <th width="20" align="center">Merek</th>
            <th width="20" align="center">Model</th>
            <th width="20" align="center">Kondisi</th>
            <th width="20" align="center">Lokasi</th>
            <th width="20" align="center">Tanggal Pengecekan</th>
            <th width="20" align="center">Petugas</th>
            <th width="40" align="center">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $item->id_perangkat }}</td>
                <td align="center">{{ $item->nama }}</td>
                <td align="center">{{ $item->kategori }}</td>
                <td align="center">{{ $item->merek }}</td>
                <td align="center">{{ $item->model }}</td>
                <td align="center">{{ $item->kondisi }}</td>
                <td align="center">{{ $item->lokasi }}</td>
                <td align="center">{{ $item->tanggal }}</td>
                <td align="center">{{ $item->user->name }}</td>
                <td align="center">{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbod>
</table>