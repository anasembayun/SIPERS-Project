@extends('layouts.main')

@section('content')
<br>
<h3 class="mb-0">Detail Buku</h3>
<br>
    @if($buku)
        <div class="card-dt mb-3">
        <br>
        <h5 class="mb-0" style="text-align: center;">{{ $buku->judul }}</h5>
        </div>
        <div class="card-dt mb-3">
            <img src="{{ asset('thumb/'.$buku->foto) }}" width="400" height="470" style="display:block; margin:auto;" >
            <br>
        </div>
        <div class="card-dt mb-3">
        <hr>
        <ul type="none">
                <li class="mb-1 text-muted">Penulis : <span>{{ $buku->penulis }}</span></li>
                <li class="mb-1 text-muted">Penerbit : <span>{{ $buku->penerbit }}</span></li>
                <li class="mb-1 text-muted">Terbit : <span>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d F Y') }}</span></li>
                <li class="mb-1 text-muted">Genre : <span>{{ $buku->genre }}</span></li>     
        </ul>
        <br>
        <div>
        <div class="card-dt mb-3">
            <ul type="none">
            <h6 class="mb-0" >Sinopsis</h6>
            <p class="mb-1 text-muted">{!! $buku->sinopsis !!}</p>
            <br>
            <br>
            </ul>
            <br>
        </div>

    @endif

@endsection

@section('script')
<script>
    (function($) {
        $('.add-to-fav').on('click', function (e) {
		e.preventDefault();

		var seo_book = $(this).attr('seo-book');

		$.ajax({
			type: 'POST',
			url: '/bookmark',
			data:{
				_token: $('meta[name="csrf-token"]').attr('content'),
				seo_book: seo_book
			},
			success: function (response) {
				alert(response);
			},
			error: function (xhr, textStatus, errorThrown) {
				if (xhr.status == 401) {
					$('#loginModal').modal();
				}
			
				if (xhr.status == 422) {
					alert(xhr.responseText);
				}
			}
		});
	});

    })(jQuery);
</script>

@endsection