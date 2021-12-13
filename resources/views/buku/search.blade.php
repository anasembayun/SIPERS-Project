@extends('layouts.master')

@section('judul')
<h1>
    <span class="docs-normal">Data Buku</span>
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

@section('search')
<div>
  <form action="{{route('buku.search')}}" method="get"  class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
  @csrf
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input name="kata" class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
</div>
@endsection

@section('tambah')
<div>
  <a class="btn btn-success btn-sm" href="{{ route('buku.create') }}"> Tambah Data</a>
</div>

@if (Session::has('pesan'))
<div class="alert alert-success">

    {{Session::get('pesan') }}

</div>
@endif

@endsection

@section('content') 

@if(count($data_buku))
    <div class="alert alert-success">Ditemukan <strong>{{count($data_buku)}}</strong>
    data dengan kata: <strong>{{ $cari }}</strong></div>
    <br>
    <br>
    <br>
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
                    <th style="font-size:12px;">Sampul</th>
                    <th style="font-size:12px;">Judul</th>
                    <th style="font-size:12px;">Penulis</th>
                    <th style="font-size:12px;">Penerbit</th>
                    <th style="font-size:12px;">Tgl. Terbit</th>
                    <th style="font-size:12px;">Genre</th>
                    <th style="font-size:12px;">Kategori</th>
                    <th style="font-size:12px;">Aksi</th>
                    <th style="font-size:12px;">Sinopsis</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($data_buku as $buku)
                    <tr>
                        <td>{{ ++$no}}</td>
                        <td><img src="{{asset('thumb/'.$buku->foto) }}" width="100px"></td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->penerbit }}</td>
                        <td>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        <td>{{ $buku->genre }}</td>
                        <td>{{ $buku->kategoris->nama_kategori }}</td>
                        <td>
                          <a href="/buku/edit/{{ $buku->id }}"><button type="button" class="btn btn-sm btn-primary"> Edit</button></a>
                          <a href="/buku/delete/{{ $buku->id }}"><button type="button" class="btn btn-sm btn-danger" onClick="return confirm('Yakin mau dihapus?')"> Hapus</button></a>
                          </td>
                        <td style="word-wrap: break-word;min-width: 800px; white-space: normal;">{!! $buku->sinopsis !!}</td>
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

@else
    <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/buku/dataBuku" class="btn btn-warning">Kembali</a></div>
@endif
 
                               

@endsection