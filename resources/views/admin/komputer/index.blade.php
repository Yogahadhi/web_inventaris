@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-desktop mr-2"></i>
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
                            <th>Lokasi</th>
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
                            <th>Operator</th>
                            <th>Keterangan</th>
                            <th>Fungsi Print</th>
                            <th>Kemampuan Desain</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">1</th>
                            <td>PC-25-004</td>
                            <td>Komputer Ruang Perakitan</td>
                            <td>HP</td>
                            <td>PC Build Up</td>
                            <td>Intel Core i5-2500S</td>
                            <td>4 GB</td>
                            <td>DDR 4</td>
                            <td>500 gb</td>
                            <td>HDD</td>
                            <td>ATI ATOMBIOS HD5450</td>
                            <td>Wifi dan LAN</td>
                            <td>Asus H110M-E</td>
                            <td>Simbadda SB-380W</td>
                            <td>Windows 10</td>
                            <td class="text-center">
                                <span class="badge badge-warning badge-pill">Perlu Perbaikan
                                </span></td>
                            <td>HDD Error</td>
                            <td>16/12/2025</td>
                            <td>Fajar</td>
                            <td>HDD tidak terbaca dan perlu instalasi MS Office</td>
                            <td>Tidak bisa</td>
                            <td>Tidak bisa</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>          
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection