@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-clipboard-list mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('laporanCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
            </div>
            <div>
                <a href="{{ route('userExcel') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>

                <a href="{{ route('userPdf') }}" class="btn btn-danger btn-sm" target='__blank'>
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
                            <th>Kategori</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Pengecekan</th>
                            <th>Petugas</th>
                            <th>Keterangan</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->id_perangkat }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <span class="badge badge-primary">
                                        {{ $item->kategori }}</span>
                                </td>
                                <td>{{ $item->merek }}</td>
                                <td>{{ $item->model }}</td>
                                <td>
                                    @if ($item->kondisi == 'Layak_Pakai')
                                        <span class="badge badge-success">
                                            {{ $item->kondisi }}
                                    @elseif ($item->kondisi == 'Perlu_Perbaikan') 
                                        <span class="badge badge-warning">
                                            {{ $item->kondisi }}
                                    @else
                                        <span class="badge badge-danger">
                                            {{ $item->kondisi }}
                                    @endif
                                </td>
                                <td>{{ $item->lokasi }}</td>
                                <td class="text-center">
                                    <span class="badge badge-primary">
                                        {{ $item->tanggal }}</span>
                                </td>
                                <td>
                                    @if ($item->user->jenis_akun == 'Admin')
                                        <span class="badge badge-dark">
                                            {{ $item->user->name }} - {{ $item->user->jenis_akun }}
                                    @else 
                                        <span class="badge badge-info">
                                            {{ $item->user->name }} - {{ $item->user->jenis_akun }}
                                    @endif
                                </td>
                                <td>{{ $item->keterangan }}</td>

                                <td class="text-center">
                                    <a href="{{ route('laporanEdit', $item->id) }}" 
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalLaporanDestroy{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @include('admin.laporan.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection