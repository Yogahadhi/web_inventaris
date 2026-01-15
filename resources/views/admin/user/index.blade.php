@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-users mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('userCreate') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data
                </a>
            </div>
            <div>
                <a href="{{ route('userExcel') }}" class="btn btn-success btn-sm">
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
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Jenis Akun</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <span class="badge badge-primary">
                                        {{ $item->jabatan }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($item->jenis_akun == 'Admin')
                                        <span class="badge badge-dark">
                                            {{ $item->jenis_akun }}
                                    @else 
                                        <span class="badge badge-info">
                                            {{ $item->jenis_akun }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('userEdit', $item->id) }}" 
                                        class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    @include('admin.user.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection