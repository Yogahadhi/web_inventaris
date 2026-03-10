@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header bg-warning">
            <a href="{{ route('komputer') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('komputerUpdate',$komputer->id) }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Id Perangkat :
                        </label>
                        <select name="id_perangkat" class="form-control @error('id_perangkat') is-invalid @enderror">
                            <option selected disabled>--Pilih Kode Id Perangkat Komputer--</option>
                            @foreach ($laporan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_perangkat', $komputer->id_perangkat) == $item->id ? 'selected' : '' }}>
                                    {{ $item->id_perangkat }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_perangkat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Perangkat :
                        </label>
                        <select name="nama" class="form-control @error('nama') is-invalid @enderror">
                            <option selected disabled>--Pilih Nama Perangkat Komputer--</option>
                            @foreach ($laporan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('nama', $komputer->nama) == $item->id ? 'selected' : '' }}>
                                    {{ $item->id_perangkat }} - {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Merek Perangkat:
                        </label>
                        <select name="merek" class="form-control @error('merek') is-invalid @enderror">
                            <option selected disabled>--Pilih Merek Perangkat Komputer--</option>
                            @foreach ($laporan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('merek', $komputer->merek) == $item->id ? 'selected' : '' }}>
                                    {{ $item->id_perangkat }} - {{ $item->merek }}
                                </option>
                            @endforeach
                        </select>
                        @error('merek')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Model Perangkat:
                        </label>
                        <select name="model" class="form-control @error('model') is-invalid @enderror">
                            <option selected disabled>--Pilih Model Perangkat Komputer--</option>
                            @foreach ($laporan as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('model', $komputer->model) == $item->id ? 'selected' : '' }}>
                                    {{ $item->id_perangkat }} - {{ $item->model }}
                                </option>
                            @endforeach
                        </select>
                        @error('model')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            CPU :
                        </label>
                        <input type="text" name="cpu" class="form-control @error('cpu') is-invalid @enderror" value="{{ $komputer->cpu }}">
                        @error('cpu')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kapasitas RAM :
                        </label>
                        <input type="text" name="kapasitas_ram" class="form-control @error('kapasitas_ram') is-invalid @enderror" value="{{ $komputer->kapasitas_ram }}">
                        @error('kapasitas_ram')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jenis RAM :
                        </label>
                        <input type="text" name="jenis_ram" class="form-control @error('jenis_ram') is-invalid @enderror" value="{{ $komputer->jenis_ram }}">
                        @error('jenis_ram')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kapasitas  Penyimpanan:
                        </label>
                        <input type="text" name="kapasitas_storage" class="form-control @error('kapasitas_storage') is-invalid @enderror" value="{{ $komputer->kapasitas_storage }}">
                        @error('kapasitas_storage')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jenis Penyimpanan :
                        </label>
                        <input type="text" name="jenis_storage" class="form-control @error('jenis_storage') is-invalid @enderror" value="{{ $komputer->jenis_storage }}">
                        @error('jenis_storage')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            VGA :
                        </label>
                        <input type="text" name="vga" class="form-control @error('vga') is-invalid @enderror" value="{{ $komputer->vga }}">
                        @error('vga')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Jaringan :
                        </label>
                        <select name="jaringan[]" multiple class="form-control @error('jaringan') is-invalid @enderror">
                            <option selected disabled>--Pilih Jenis Jaringan (Tekan CTRL Untuk Memilih Lebih Dari Satu)--</option>
                            <option value="Wifi">Wifi</option>
                            <option value="LAN">LAN</option>
                            <option value="Bluetooth">Bluetooth</option>
                        </select>
                        @error('jaringan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Motherboard :
                        </label>
                        <input type="text" name="motherboard" class="form-control @error('motherboard') is-invalid @enderror" value="{{ $komputer->motherboard }}">
                        @error('motherboard')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            PSU :
                        </label>
                        <input type="text" name="psu" class="form-control @error('psu') is-invalid @enderror" value="{{ $komputer->psu }}">
                        @error('psu')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Sistem Operasi :
                        </label>
                        <input type="text" name="sistem_operasi" class="form-control @error('sistem_operasi') is-invalid @enderror" value="{{ $komputer->sistem_operasi }}">
                        @error('sistem_operasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kondisi :
                        </label>
                        <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror">
                            <option selected disabled>--Pilih Kondisi--</option>
                            <option value="Layak Pakai" {{ $komputer->kondisi == 'Layak Pakai' ? 'selected' : '' }}>Layak Pakai</option>
                            <option value="Perlu Perbaikan" {{ $komputer->kondisi == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                            <option value="Rusak" {{ $komputer->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                   <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Status Teknis :
                        </label>
                        <input type="text" name="status_teknis" class="form-control @error('status_teknis') is-invalid @enderror" value="{{ $komputer->status_teknis }}">
                        @error('status_teknis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Pengeditan Data :
                        </label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                        @error('tanggal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Petugas :
                        </label>
                        <select name="created_by" class="form-control @error('created_by') is-invalid @enderror">
                            <option selected disabled>--Pilih Akun Petugas yang Menginput Data--</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->jenis_akun }}</option>
                            @endforeach
                        </select>
                        @error('created_by')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Keterangan :
                        </label>
                        <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ $komputer->keterangan }}</textarea>
                        @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Fungsi Print :
                        </label>
                        <textarea name="fungsi_print" rows="3" class="form-control @error('fungsi_print') is-invalid @enderror">{{ $komputer->fungsi_print }}</textarea>
                        @error('fungsi_print')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kemampuan Desain :
                        </label>
                        <textarea name="desain" rows="3" class="form-control @error('desain') is-invalid @enderror">{{ $komputer->desain }}</textarea>
                        @error('desain')
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