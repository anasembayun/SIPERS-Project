@extends('layouts.master')

@section('judul')
<h1>
    <span class="docs-normal">Data Anggota</span>
</h1>
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
              <a class="nav-link" href="{{ route('buku.dataBuku') }}">
              <i class="ni ni-books text-info"></i>
                <span class="nav-link-text">Data Buku</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('pustakawan.dataAnggota') }}">
                <i class="ni ni-single-02 text-info"></i>
                <span class="nav-link-text">Data Anggota</span>
              </a>
            </li>
</ul>

@endsection

@section('search')
<div>
    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
</div>
@endsection


@section('content')    
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-color" >
                  <tr style="text-align: center;">
                    <th style="font-size:12px;">No</th>
                    <th style="font-size:12px;">Nama</th>
                    <th style="font-size:12px;">Jenis Kelamin</th>
                    <th style="font-size:12px;">Alamat</th>
                    <th style="font-size:12px;">E-mail</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($data_anggota as $anggota)
                    <tr style="text-align: center;">
                        <td>{{ ++$no}}</td>
                        <td>{{ $anggota->name }}</td>
                        <td>{{ $anggota->jk }}</td>
                        <td>{{ $anggota->alamat }}</td>
                        <td>{{ $anggota->email }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
    </div>
  </div>
                               

@endsection