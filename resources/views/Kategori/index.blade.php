@extends('layouts.master')

@section('judul')
<h1>
    <span class="docs-normal">Kategori Buku</span>
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

@section('tambah')
<div>
  <a class="btn btn-success btn-sm" href="{{ route('kategori.create') }}"> Tambah Data</a>
</div>

@if (Session::has('pesan'))
<div class="alert alert-success">

    {{Session::get('pesan') }}

</div>
@endif

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
                    <th style="font-size:12px;">Sampul</th>
                    <th style="font-size:12px;">Kategori</th>
                    <th style="font-size:12px;">Keterangan</th>
                    <th style="font-size:12px;">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($kategori as $kategoris)
                    <tr style="text-align: center;">
                        <td>{{ ++$no}}</td>
                        <td><img src="{{asset('thumb/'.$kategoris->foto) }}" width="100px"></td>
                        <td>{{ $kategoris->nama_kategori }}</td>
                        <td>{{ $kategoris->keterangan }}</td>
                        <td>
                          <a href="/kategori/edit/{{ $kategoris->id }}"><button type="button" class="btn btn-sm btn-primary"> Edit</button></a>
                          <a href="/kategori/delete/{{ $kategoris->id }}"><button type="button" class="btn btn-sm btn-danger" onClick="return confirm('Yakin mau dihapus?')"> Hapus</button></a>
                          </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                {{ $kategori->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
    </div>
  </div>
                               

@endsection