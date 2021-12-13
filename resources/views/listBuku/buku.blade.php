@extends('layouts.main')

@section('content')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-he">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Buku-buku menarik berdasarkan kategori</h1>
      <p class="lead my-3">Mencari buku menarik di Sipers. Berikut ini kumpulan buku berdasarkan kategori  {{ $kategoris->nama_kategori }} .</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Scroll for continue...</a></p>
    </div>
  </div>


  <main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Kategori {{ $kategoris->nama_kategori }}
      </h3>
      <div class="row">
      @foreach ($bukus as $data)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <a href="{{ asset('thumb/'.$data->foto) }}"
            data-lightbox="image-1" data-title="{{ $data->judul }}">
          <img src="{{ asset('thumb/'.$data->foto) }}" width="100%" height="225" class="card-img-top" alt="...">
          </a>
            <div class="card-body">
              <p class="card-text">{{ $data->judul }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('detailBuku.detail',$data->judul) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  <a href="{{ route('buku.like',$data->id) }}" type="button" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg></a>
                </div>
                <small class="text-muted">{{$data->suka}} Suka</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </div>
        <br>
        <div>{{ $bukus->links() }}</div>
    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4">
        <h4 class="font-italic">Popular</h4>
        <ol class="list-unstyled mb-0">
        @foreach ($buku_suka as $data)
          <li><a href="{{ route('detailBuku.detail',$data->judul) }}">{{ $data->judul }}</a></li>
        @endforeach
        </ol>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Terbaru</h4>
        <ol class="list-unstyled mb-0">
        @foreach ($buku_new as $data)
          <li><a href="{{ route('detailBuku.detail',$data->judul) }}">{{ $data->judul }}</a></li>
        @endforeach
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

@endsection
