@extends('layouts.main')

@section('content')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-he">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Temukan kategori buku yang Anda Cari!</h1>
      <p class="lead my-3">Mencari buku dengan mudah melalui kategori. Temukan beragam buku menarik berdasarkan kategori-kategori berikut ini.</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Scroll for continue...</a></p>
    </div>
  </div>


<main role="main" class="container">
  
    <div>
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Kategori Buku
      </h3>
        <div class="row">
        @foreach ($kategori as $kategoris)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <a href="{{ route('listbuku.buku',$kategoris->kategori_seo) }}">
          <img src="{{ asset('thumb/'.$kategoris->foto) }}" width="100%" height="225" class="card-img-top" alt="...">
          </a>

            <div class="card-body">
              <h6>{{ $kategoris->nama_kategori }}</h6>
              <p class="card-text">{{ $kategoris->keterangan }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('listbuku.buku',$kategoris->kategori_seo) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted"></small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <br>
      <div>{{ $kategori->links() }}</div>
    </div><!-- /.blog-main -->
  </main><!-- /.container -->

@endsection