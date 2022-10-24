
<h4> Show Project </h4>
    @if ($project->isEmpty())
    <h6>Siswa Belum Memiliki Project</h6>

    @else
    
        @foreach ($project as $item)
            <div class="card">
                <div class="card-header">
                <strong>{{ $item->nama_project }}</strong>
                </div>
                <div class="card-body">
                <p>{{ $item->deskripsi }}</p>
                </div>
                <div class="card-footer text-left">
                    <a href="{{ route('masterproject.edit', $item -> id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('masterproject.hapus', $item -> id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                </div>
            </div>

    
        @endforeach
    @endif




