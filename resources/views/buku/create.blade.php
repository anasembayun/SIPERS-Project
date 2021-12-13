@extends('layouts.master')

@section('judul')
<h1>Data Buku</h1>
@endsection
@section('title')
<div>
<h3>Tambah Data Buku</h3>
</div>
@endsection

@section('kembali')
<div>
<a class="btn btn-primary btn-sm" href="{{ route('kategori.index') }}"> Kembali</a>
</div>
@if (count($errors) > 0)
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

@endsection

@section("menu")
<ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('pustakawan.dashboard') }}">
                <i class="ni ni-tv-2 text-info"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('kategori.index') }}">
              <i class="ni ni-single-copy-04 text-info"></i>
                <span class="nav-link-text">Kategori Buku</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('buku.dataBuku') }}">
              <i class="ni ni-books text-info"></i>
                <span class="nav-link-text">Data Buku</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('pustakawan.dataAnggota') }}">
              <i class="ni ni-single-02 text-info"></i>
                <span class="nav-link-text">Data Anggota</span>
              </a>
            </li>
</ul>

@endsection

@section('content')


<br>
<div class="container-fluid mt--6">
<!-- Form Input Data -->
<form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-data">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ old('judul') }}">
            </div>
            <div class="form-group col-md-6">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" name="penulis" placeholder="Penulis" value="{{ old('penulis') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" value="{{ old('penerbit') }}">
            </div>
            <div class="form-group col-md-6">
            <label for="tgl_terbit">Tgl. Terbit</label>
            <input type="date" class="form-control" name="tgl_terbit" value="{{ old('tgl_terbit') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" name="genre" placeholder="Genre" value="{{ old('genre') }}">
            </div>
            <div class="form-group col-md-6">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" class="form-control">
                <option selected>Pilih Kategori</option>
            @foreach ($kategori as $data)
                <option value="{{ $data->id }}">{{ $data->nama_kategori }} </option>
            @endforeach
            </select>
            </div>
        </div>

        <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" id="summernote" rows="10" class="form-control">{{ old('sinopsis') }}</textarea>
        </div>
       
        <div class="form-group">
            <label for="foto">Upload Sampul</label>
            <input type="file" name="foto" class="form-control" placeholder="image"> 
        </div> 

        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            <br>
              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
              <a class="btn btn-danger btn-sm" href="{{ url()->previous() }}"> Batal</a>
        </div>
    </div>
    </form>
</div>

@endsection
