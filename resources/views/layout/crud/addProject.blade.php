@extends('layout.admin')

@section('title', 'Tambah Project')

@section('content-title', 'Tambah Project - '. $siswa->nama)

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
    <form action="{{ route('masterproject.store') }}" method="post">
  @csrf
    <div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group">
            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
            <label for="nama">Nama Project</label>
            <input type="text" class="form-control" id="nama" name="nama_project" value="">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Project</label><br>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal Project</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="">
        </div>
        <div class="form-group">
            {{-- <a href="" class="btn btn-success" type="submit">Simpan</a> --}}
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="" class="btn btn-danger" >Hapus</a>
        </div>
    </form>
</div>
</div>

@endsection


