@extends('layout.admin')

@section('title', 'Master Siswa')

@section('content-title', 'Data Siswa')


@section('content')
@if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <button class="close" type="button" data-dismiss="alert">X</button>
      <strong>{{ $message }}</strong>
  </div>
@endif
@if($pesan = Session::get('gagal'))
  <div class="alert alert-danger alert-block">
      <button class="close" type="button" data-dismiss="alert">X</button>
      <strong>{{ $pesan }}</strong>
  </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
                <a href="{{ route('mastersiswa.create') }}" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NISN</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $i => $item)
                      <tr>
                        <th scope="row">{{ ++$i }}</th>
                        {{-- <th scope="row">{{ $loop -> iteration }}</th> --}}
                        
                            
                        <td>{{ $item -> nama }}</td>
                        <td>{{ $item -> nisn }}</td>
                        <td>{{ $item -> alamat }}</td>
                        <td>
                          <a href="{{ route('mastersiswa.show', $item -> id) }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                          @if(auth()->user()->role == 'admin')
                         
                          <a href="{{ route('mastersiswa.edit', $item -> id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>

                          <a href="{{ route('mastersiswa.hapus', $item -> id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                          @endif
                          
                        </td>
                      </tr>
                      @endforeach
                                
                    
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection


