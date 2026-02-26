<table>
    <thead>
        <tr>
            <th colspan="13" align="center">Data Laporan Inventaris</th> 
        </tr> 
        <tr>
            <th colspan="13" align="center">Dicetak pada tanggal: {{ $tanggal }}</th> 
        </tr> 
        <tr>
            <th colspan="13" align="center">Pukul: {{ $jam }}</th> 
        </tr> 
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
                <td>{{ $item->id_perangkat }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->merek }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>