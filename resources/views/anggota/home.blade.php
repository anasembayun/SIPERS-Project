@extends('layouts.main')

@section('content')

<main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="{{ asset('assets/img/wallpaperbetter.jpg') }}" >
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Beragam buku menarik</h1>
            <span class="hightlight">Perpustakaan kami memiliki beragam jenis buku. Mulai dari buku-buku ilmu pengetahuan, ensiklopedia, kamus bahasa, penelitian, novel, komik, dan beragam jenis buku lainnya. Semua dapat Anda temukan di perpustakaan kami.</span>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="{{ asset('assets/img/huis.jpg') }}" >
        <div class="container">
          <div class="carousel-caption">
            <h1>Fasilitas lengkap</h1>
            <span class="hightlight">Perpustakaan kami menyediakan ruangan yang nyaman dan tenang untuk membaca, ruang berdiskusi, ruang rapat, dan fasilitas-fasilitas lainnya.</span>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="{{ asset('assets/img/gedung.jpg') }}" >
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Kunjungungi perpustakaan kami sekarang!</h1>
            <span class="hightlight">Kunjungi perpustakaan kami sekarang di jl.Mawar No.50 Bunga Raya 008776</span>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev bg-trans" type="button" data-target="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next bg-trans" type="button" data-target="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Perpustakaan</h2>
        <p class="lead">Perpustakaan adalah sebuah ruangan, bagian sebuah Gedung ataupun gedung itu sendiri yang digunakan untuk menyimpan buku dan terbitan lainnya yang biasanya disimpan menurut tata susunan tertentu untuk digunakan pembaca, bukan untuk dijual. </p>
      </div>
      <div class="col-md-5">
      <img src="{{ asset('assets/img/perpustakaan.jpg') }}"width="400" height="400" >
        
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Kenapa perpustakaan?</h2>
        <p class="lead">Perpustakaan memegang peranan penting sebagai media, dan sarana penggerak penyebarluasan ilmu pengetahuan kepada publik.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="{{ asset('assets/img/rak.jpg') }}"width="400" height="400" >
      </div>
    </div>

    
    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

</main>


@endsection