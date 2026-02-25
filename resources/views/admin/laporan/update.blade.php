@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-warning">
            <a href="{{ route('laporan') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('laporanUpdate',$laporan->id) }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Id Perangkat :
                        </label>
                        <input type="text" name="id_perangkat" class="form-control @error('id_perangkat') is-invalid @enderror" value="{{ $laporan->id_perangkat }}">
                        @error('id_perangkat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Perangkat :
                        </label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $laporan->nama }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kategori :
                        </label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                            <option selected disabled>--Pilih Kategori--</option>
                            <option value="Komputer" {{ $laporan->kategori == 'Komputer' ? 'selected' : ''}}>Komputer</option>
                            <option value="Mouse" {{ $laporan->kategori == 'Mouse' ? 'selected' : ''}}>Mouse</option>
                            <option value="Monitor" {{ $laporan->kategori == 'Monitor' ? 'selected' : ''}}>Monitor</option>
                            <option value="Keyboard" {{ $laporan->kategori == 'Keyboard' ? 'selected' : ''}}>Keyboard</option>
                            <option value="Printer" {{ $laporan->kategori == 'Printer' ? 'selected' : ''}}>Printer</option>
                            <option value="Scanner" {{ $laporan->kategori == 'Scanner' ? 'selected' : ''}}>Scanner</option>
                            <option value="Speaker" {{ $laporan->kategori == 'Speaker' ? 'selected' : ''}}>Speaker</option>
                        </select>
                        @error('kategori')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Merek :
                        </label>
                        <input type="text" name="merek" class="form-control @error('merek') is-invalid @enderror" value="{{ $laporan->merek }}">
                        @error('merek')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Model :
                        </label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ $laporan->model }}">
                        @error('model')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kondisi :
                        </label>
                        <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror">
                            <option selected disabled>--Pilih Kondisi--</option>
                            <option value="Layak_Pakai" {{ $laporan->kondisi == 'Layak_Pakai' ? 'selected' : ''}}>Layak Pakai</option>
                            <option value="Perlu_Perbaikan" {{ $laporan->kondisi == 'Perlu_Perbaikan' ? 'selected' : ''}}>Perlu Perbaikan</option>
                            <option value="Rusak" {{ $laporan->kondisi == 'Rusak' ? 'selected' : ''}}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Lokasi :
                        </label>
                        <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ $laporan->lokasi }}">
                        @error('lokasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Pengeditan :
                        </label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                        @error('tanggal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Petugas :
                        </label>
                        <select name="created_by" class="form-control @error('created_by') is-invalid @enderror">
                            <option selected disabled>--Pilih Akun Petugas yang Mengedit Data--</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->jenis_akun }}</option>
                            @endforeach
                        </select>
                        @error('created_by')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Keterangan :
                        </label>
                        <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ $laporan->keterangan }}</textarea>
                        @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </button>
                </div>
            </form>

        </div>
    </div>


@endsection