@extends('layout.admin')

@section('title', 'Edit Siswa')

@section('content-title', 'Edit Siswa')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
        <div class="card-body">
            
            @if (count($errors) > 0)

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <form action="{{ route('mastersiswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
            </div>
            <div class="form-group">
                <label for="nisn">NISN : </label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $siswa->nisn }}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat : </label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siswa->alamat }}">
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin : </label>
                <select name="jk" id="jk" class="form-select form-control">
                    <option value="laki-laki"@if($siswa->jk === "laki-laki")selected @endif>Laki-Laki</option>
                    <option value="perempuan"@if($siswa->jk === "perempuan")selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto Siswa : </label>
                <img src="{{ asset('/template/img/'.$siswa->foto) }}" alt="" width="300" class="img-thumbnail">
                <input type="file" class="form-control-file" id="foto" name="foto" >
            </div>
            <div class="form-group">
                <label for="alamat">About : </label>
                <textarea name="about" id="about" class="form-control">{{ $siswa->about }}</textarea>
            </div>
            <input type="submit" class="btn btn-success">
            <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Kembali</a>

        </form>  
        </div>
    </div>
    </div>
</div>

@endsection


