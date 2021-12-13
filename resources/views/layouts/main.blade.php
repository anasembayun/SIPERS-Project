<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SiPers</title>

    <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/blog/">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet">
  </head>
  <body>
    
<div class="container bg-white">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
        <a class="text-muted" href="#">{{ Auth::user()->name }}</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">SiPers</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="nav-link text-muted" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-spaceship text-info"></i>{{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </div>
    </div>
    </header>

  <div class="nav-scroller py-1 mb-2 bg-nav">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 clr-white" href="{{ route('anggota.home') }}">Home</a>
      <a class="p-2 clr-white" href="{{ route('anggota.listkategori') }}">Kategori</a>
      <a class="p-2 clr-white" href="{{ route('anggota.semuaBuku') }}">Semua Buku</a>
      <a class="p-2 clr-white" href="#">About Us</a>
    </nav>
  </div>
  
  
    @yield('content')


    <footer class="blog-footer">
    <p>&copy; 2021 Creative-team, Ana. &middot; <a >UAS</a> &middot; <a >PPW2</a></p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

      
    <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
    @yield('script')
  </body>
</html>
