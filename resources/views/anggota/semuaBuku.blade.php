@extends('layouts.main')

@section('content')
<br>
<br>
<main role="main" class="container">
<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Daftar Buku
      </h3>
        <div class="row">
        @foreach ($data_buku as $buku)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          <a href="{{ route('detailBuku.detail',$buku->judul) }}">
          <img src="{{ asset('thumb/'.$buku->foto) }}" width="100%" height="225" class="card-img-top" alt="...">
          </a>

            <div class="card-body">
              <p class="card-text">{{ $buku->judul }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('detailBuku.detail',$buku->judul) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  <a href="{{ route('buku.like',$buku->id) }}" type="button" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                </svg></a>
                </div>
                <small class="text-muted">{{$buku->suka}} Suka</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <br>
      <div>{{ $data_buku->links() }}</div>
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