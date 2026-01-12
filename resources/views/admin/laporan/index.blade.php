@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-clipboard-list mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
            {{--<div class="mb-1 mr-2">
                <a href="#" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
            </div>--}}
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class ="text-center">
                            <th>No</th>
                            <th>ID Perangkat</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th>Tanggal Pengecekan</th>
                            <th>Operator</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">1</th>
                            <td>PC-25-004</td>
                            <td>Komputer Ruang Perakitan</td>
                            <td class="text-center">
                                <span class="badge badge-success badge-pill">Komputer
                                </span></td>
                            <td>HP</td>
                            <td >HP Pavilion Slimline</td>
                            <td class="text-center">
                                <span class="badge badge-success badge-pill">Layak Pakai
                                </span></td>
                            <td>Ruang Perakitan</td>
                            <td>26/11/2025</td>
                            <td>Yoga</td>
                            <td>Hanya ada bunyi kipas</td>
                        </tr>          
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection