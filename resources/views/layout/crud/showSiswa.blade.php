@extends('layout.admin')

@section('title', 'Show Siswa')

@section('content-title', 'Show Siswa')

@section('content')
<div class="row">
    <div class="col-lg-4">
      <div class="card shadow mb-4">
      <div class="card-header">

      </div>
      <div class="card-body text-center">
        <img src="{{ asset('/template/img/'.$siswa->foto) }}" alt="" width="200" class="img-thumbnail">
        <h4 class=""> {{ $siswa->nama }} </h4>
        <h6><i class="fas fa-id-card"></i> {{ $siswa->nisn }}</h6>
        <h6><i class="fas fa-venus-mars"></i> {{ $siswa->jk }}</h6>
        <h6><i class="fas fa-map"></i> {{ $siswa->nisn }}</h6>

   </div>
 </div>   
     <div class="card shadow mb-4">
     <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary" ><i class="fas fa-user-plus"></i> Kontak Siswa</h6>
     </div>
        <div class="card-body">
          @foreach ($kontak as $k)
              <li>{{ $k->jenis_kontak  }} : {{ $k->pivot->deskripsi }}</li>
          @endforeach
     </div>
   </div>
 </div>
     <div class="col-lg-8">
        <div class="card shadow mb-4">
          <div class="card-header"> 
            <h6 class="m-0 font-weight-bold text-primary" ><i class="fas fa-quote-left"></i> About Siswa</h6>
          </div>
           <div class="card-body text-center">

            <blockquote class="blockquote">
              <p class="mb-0">{{ $siswa->about }}</p>
              <br>
              <footer class="blockquote-footer">Someone famous in <cite title="Source Title">{{ $siswa->nama }}</cite></footer>
            </blockquote>
          </div>
 </div>   
      <div class="card shadow mb-4">
        <div class="card-header">
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
                      
                  </div>
                  <br>
          
              @endforeach
          @endif
        </div>
         <div class="card-body">
          
       </div>
   </div>
 </div>

  </div>
@endsection


