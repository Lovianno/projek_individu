
<h4> Show Kontak </h4>
@if ($kontak->isEmpty())
<h6>Siswa Belum Memiliki Project</h6>
@else
    {{ $kontak }}
    @foreach ($kontak as $item)
    {{-- {{ $item->pivot->id }} --}}
    <div class="card">
            <div class="card-header">
            <strong>{{ $item->jenis_kontak }}</strong>
            </div>
            <div class="card-body">
            <p>{{ $item->pivot->deskripsi }}</p>
            </div>x
            <div class="card-footer text-left">
                <a href="{{ route('mastercontact.edit', $item->pivot->id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                <a href="{{ route('mastercontact.hapus', $item->pivot->id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
            </div>
        </div>  


    @endforeach
@endif




