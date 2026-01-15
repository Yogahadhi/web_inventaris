<h3 align="center">Data User</h3>
<h3 align="center">Dicetak pada tanggal: {{ $tanggal }}</h3>
<h3 align="center">Pukul: {{ $jam }}</h3>
<hr>
<table width="100%" border='1px' style="border-collapse:collapse;">
    <thead>
        <tr>
            <th width="10" align="center">No</th>
            <th width="20" align="center">Nama</th>
            <th width="20" align="center">Jabatan</th>
            <th width="20" align="center">Jenis Akun</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align="center">{{ $item->name }}</td>
                <td align="center">{{ $item->jabatan }}</td>
                <td align="center">{{ $item->jenis_akun }}</td>
            </tr>
        @endforeach
    </tbody>
</table>