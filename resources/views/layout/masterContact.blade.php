@extends('layout.admin')

@section('title', 'Master Contact')

@section('content-title', 'Master Kontak')

@section('content')
@if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <button class="close" type="button" data-dismiss="alert">X</button>
      <strong>{{ $message }}</strong>
  </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
                {{-- <a href="{{ route('mastersiswa.create') }}" class="btn btn-success">Tambah Data</a> --}}
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" >Jenis Kontak</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jenis_kontak as $i => $item)
                      <tr>
                        <th scope="row">{{ ++$i }}</th>
                        {{-- <th scope="row">{{ $loop -> iteration }}</th> --}}
                        <td>{{ $item ->jenis_kontak }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-lg-5">
      <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary" >Data Siswa</h6>
      </div>
      <div class="card-body text-center">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">NISN</th>
                <th scope="col">NAMA</th>
                <th scope="col">ACTION</th> 
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    
              
              <tr>
                <td>{{ $item ->nisn }}</td>
                <td>{{ $item ->nama }}</td>
                <td>
                    <a  onclick="show({{ $item->id }})" class="btn btn-sm btn-info"><i class="fa fa-folder-open"></i></a>
                    <a href="{{ route('mastercontact.tambah', $item->id) }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="card-footer d-flex justify-content-end">
                {{  $data->links() }}
          </div>
     </div>
    </div>   
   
 </div>

<div class="col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary" >Project Siswa</h6>
      </div>
      <div class="card-body text-center" id="project">
        <h6 class="text-center">Pilih Siswa Terlebih Dahulu</h6>
     </div>
    </div>   
 </div>

  </div>

  <script> 
  function show(id){
    $.get('mastercontact/'+id, function(data){
      $('#project').html(data);
    });
  }
  </script>
@endsection




