<table>
    <thead>
        <tr>
            <th width="10">No</th>
            <th width="20">Nama</th>
            <th width="20">Jabatan</th>
            <th width="20">Jenis Akun</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->jenis_akun }}</td>
            </tr>
        @endforeach
    </tbody>
</table>