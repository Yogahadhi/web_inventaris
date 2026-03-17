<table>
    <thead>
        <tr>
            <th colspan="8" align="center">Laporan Data Stock Opname</th> 
        </tr> 
        <tr>
            <th colspan="8" align="center">Dicetak pada tanggal: {{ $tanggal }}</th> 
        </tr> 
        <tr>
            <th colspan="8" align="center">Pukul: {{ $jam }}</th> 
        </tr> 
        <tr>
            <th width="10" align="center">No</th>
            <th width="20" align="center">Kategori</th>
            <th width="30" align="center">Nama</th>
            <th width="20" align="center">Jumlah</th>
            <th width="20" align="center">Lokasi</th>
            <th width="20" align="center">Tanggal Pengecekan</th>
            <th width="20" align="center">Petugas</th>
            <th width="40" align="center">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stockopname as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->nama }}</td>
                <td align="center">{{ $item->jumlah }}</td>
                <td>{{ $item->lokasi }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->user->name }} - {{ $item->user->jenis_akun }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>