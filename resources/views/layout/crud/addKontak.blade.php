@extends('layout.admin')

@section('title', 'Tambah Kontak')

@section('content-title', 'Tambah Kontak')

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
    <form action="{{ route('mastercontact.store') }}" method="post">
  @csrf
    <div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group">
            <label for="jenisKontak">Kategori :</label>
        <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
        <select class="custom-select" id="jenisKontak" name="jenis_kontak_id">
            <option selected value="">Pilih</option>
            @foreach($jenis_kontak as $item)
             <option value="{{ $item->id }}">{{ $item->jenis_kontak }}</option>
             @endforeach
         </select>
         
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Kontak</label><br>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Simpan">
            <a href="/mastercontact" class="btn btn-danger" >Kembali</a>
        </div>
    </form>
    </form>
</div>
</div>

@endsection
    



