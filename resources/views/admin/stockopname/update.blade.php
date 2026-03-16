@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-warning">
            <a href="{{ route('stock-opname') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('stockopnameUpdate', $stockopname->id) }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kategori :
                        </label>
                        <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{ $stockopname->kategori }}">
                        @error('kategori')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Barang :
                        </label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $stockopname->nama }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jumlah :
                        </label>
                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ $stockopname->jumlah }}">
                        @error('jumlah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Lokasi:
                        </label>
                        <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ $stockopname->lokasi }}">
                        @error('lokasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Pengeditan :
                        </label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                        @error('tanggal')
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
                            <option value="Baik" {{ $stockopname->kondisi =='Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Perlu Pengecekan" {{ $stockopname->kondisi =='Perlu Pengecekan' ? 'selected' : '' }}>Perlu Pengecekan</option>
                            <option value="Rusak" {{ $stockopname->kondisi =='Rusak' ? 'selected' : '' }}>Rusak</option>
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
                        <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ $stockopname->keterangan }}</textarea>
                        @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-edit mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>


@endsection