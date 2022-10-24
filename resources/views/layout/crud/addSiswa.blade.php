@extends('layout.admin')

@section('title', 'Tambah Siswa')

@section('content-title', 'Tambah Siswa')

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
              <form method="post" action="{{ route('mastersiswa.store') }}" enctype="multipart/form-data">
                @csrf
                {{-- @csrf ditambahkan ke codingan form view jika berhubungan dengan database
                        seperti ingin input data ke database --}}

                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                </div>
                <div class="form-group">
                    <label for="nisn">NISN : </label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ old('nisn') }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat : </label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamin : </label>
                    <select name="jk" id="jk" class="form-select form-control">
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto Siswa : </label>
                    <input type="file" class="form-control-file" id="foto" name="foto" >
                </div>
                <div class="form-group">
                    <label for="alamat">About : </label>
                    <textarea name="about" id="about" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-success">
                <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Kembali</a>

            </form>  
            </div>
        </div>
        </div>
    </div>
@endsection


