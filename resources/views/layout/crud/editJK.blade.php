@extends('layout.admin')

@section('title', 'Edit Jenis Kontak')

@section('content-title', 'Edit Jenis Kontak')

@section('content')
@if (count($errors) > 0)

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-4">
                <h1 class="h1 mb-1 text-gray-800 text-center">Edit Jenis Kontak</h1>
              
               
            </div>
        <div class="card-body">
            
          <form method="post" action="{{ route('masterjk.update', $jk->id) }}">
            @csrf
            @method('PUT')
            {{-- @csrf ditambahkan ke codingan form view jika berhubungan dengan database
                    seperti ingin input data ke database --}}

            <div class="form-group">
                <label for="nama">Jenis Kontak : </label>
                <input type="text" class="form-control" id="nama" name="jenis_kontak" value="{{ $jk->jenis_kontak }}">
            </div>
            
            <input type="submit" class="btn btn-success">
            <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Kembali</a>
        </form>  
        </div>
    </div>
    </div>
</div>
@endsection