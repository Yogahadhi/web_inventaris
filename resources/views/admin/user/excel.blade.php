<table>
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
                <td>{{ $item->name }}</td>
                <td>{{ $item->jabatan }}</td>
                <td align="center">{{ $item->jenis_akun }}</td>
            </tr>
        @endforeach
    </tbody>
</table>