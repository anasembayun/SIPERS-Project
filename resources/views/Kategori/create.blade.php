@extends('layouts.master')

@section('judul')
<h1>Kategori Buku</h1>
@endsection
@section('title')
<div>
<h3>Tambah Data Kategori</h3>
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
              <a class="nav-link active" href="{{ route('kategori.index') }}">
              <i class="ni ni-single-copy-04 text-info"></i>
                <span class="nav-link-text">Kategori Buku</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('buku.dataBuku') }}">
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
<div class="container-fluid mt--6">
<!-- Form Input Data -->
<form action="{{route('kategori.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-data">
        <div class="form-group row">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Kategori :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" value="{{ old('kategori') }}">
                <span class="text-form">
                Masukkan nama kategori buku Anda (Contoh: Novel).
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">Keterangan :</label>
            <div class="col-sm-10">
                <textarea name="keterangan" class="form-control"  placeholder="Keterangan"></textarea>
                <span class="text-form">
                Masukkan penjelasan singkat mengenai isi dari kategori.
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Sampul :</label>
            <div class="col-sm-10">
            <input type="file" name="foto" class="form-control" placeholder="image">
            </div>
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
