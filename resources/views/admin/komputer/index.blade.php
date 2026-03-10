@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-desktop mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('komputerCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
            </div>
            <div>
                <a href="#" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>

                <a href="#" class="btn btn-danger btn-sm">
                    <i class="fas fa-file-pdf mr-2"></i>
                    PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class ="text-center">
                            <th>No</th>
                            <th>ID Perangkat</th>
                            <th>Nama Perangkat</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>CPU</th>
                            <th>Kapasitas RAM</th>
                            <th>Jenis RAM</th>
                            <th>Kapasitas Penyimpanan</th>
                            <th>Jenis Penyimpanan</th>
                            <th>VGA</th>
                            <th>Jaringan</th>
                            <th>Motherboard</th>
                            <th>PSU</th>
                            <th>Sistem Operasi</th>
                            <th>Kondisi</th>
                            <th>Status Teknis</th>
                            <th>Tanggal Pengecekan</th>
                            <th>Petugas</th>
                            <th>Keterangan</th>
                            <th>Fungsi Print</th>
                            <th>Kemampuan Desain</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($komputer as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
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
                                <td>
                                    @if ($item->kondisi == 'Layak Pakai')
                                        <span class="badge badge-success">
                                            {{ $item->kondisi }}
                                    @elseif ($item->kondisi == 'Perlu Perbaikan') 
                                        <span class="badge badge-warning">
                                            {{ $item->kondisi }}
                                    @else
                                        <span class="badge badge-danger">
                                            {{ $item->kondisi }}
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $item->status_teknis }}</td>
                                <td class="text-center">
                                    <span class="badge badge-primary">
                                        {{ $item->tanggal }}</span>
                                </td>
                                <td>
                                    @if ($item->user->jenis_akun == 'Admin')
                                        <span class="badge badge-dark">
                                            {{ $item->user->name }} - {{ $item->user->jenis_akun }}</span>
                                    @else 
                                        <span class="badge badge-info">
                                            {{ $item->user->name }} - {{ $item->user->jenis_akun }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->keterangan }}</td>
                                <td>{{ $item->fungsi_print }}</td>
                                <td>{{ $item->desain }}</td>

                                <td class="text-center">
                                    <a href="{{ route('komputerEdit', $item->id) }}" 
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalKomputerDestroy{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @include('admin.komputer.modal')
                                </td>                               
                            </tr>
                        @endforeach      
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection