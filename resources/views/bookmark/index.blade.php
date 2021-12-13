@extends('layouts.main')

@section('content')
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
                    <th style="font-size:12px;">Genre</th>
                    <th style="font-size:12px;">Aksi</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach ($data as $buku)
                    <tr>
                        <td>{{ ++$no}}</td>
                        <td><img src="{{asset('thumb/'.$buku->foto) }}" width="100px"></td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->genre }}</td>
                        <td>
                          <a href="/buku/delete/{{ $buku->id }}"><button type="button" class="btn btn-sm btn-danger" onClick="return confirm('Yakin mau dihapus?')"> Hapus</button></a>
                          </td>
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