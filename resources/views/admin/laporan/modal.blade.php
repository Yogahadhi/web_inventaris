<!-- Modal Delete -->
<div class="modal fade" id="modalLaporanDestroy{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus {{ $title }} ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <div class="row">
            <div class="col-6">
                Id Perangkat
            </div>
            <div class="col-6">
                : <span class="badge badge-success">{{ $item->id_perangkat }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                Nama Perangkat
            </div>
            <div class="col-6">
                : 
                <span class="badge badge-primary">{{ $item->nama }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                Kategori
            </div>
            <div class="col-6">
                : 
                @if($item->kondisi == 'Layak_Pakai')
                     <span class="badge badge-success">
                        {{ $item->kondisi }}
                    </span>
                @elseif($item->kondisi == 'Perlu_Perbaikan')
                     <span class="badge badge-warning">
                        {{ $item->kondisi }}
                    </span>
                @else
                    <span class="badge badge-info">
                        {{ $item->kondisi }}
                    </span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                Lokasi
            </div>
            <div class="col-6">
                : 
                <span class="badge badge-primary">{{ $item->lokasi }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                Tanggal Penginputan
            </div>
            <div class="col-6">
                : 
                <span class="badge badge-primary">{{ $item->tanggal }}</span>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
            <i class="fas fa-times"></i>
            Tutup</button>
        <form action="{{ route('laporanDestroy',$item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash-alt"></i>
                Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
</div>