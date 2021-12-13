<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Buku;
use App\Kategori;
use file;
use Image;

class BukuController extends Controller
{
    public function dataBuku(){
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.dataBuku', compact('data_buku', 'no'));
    }

    public function create(){
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'genre' => 'required',
            'tgl_terbit' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->genre = $request->genre;
        $buku->sinopsis = $request->sinopsis;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->buku_seo = Str::slug($request->judul);
       

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();      

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);

        $buku->foto = $namafile;
        $buku->save();
        return redirect('buku/dataBuku')->with('pesan', 'Data Buku Berhasil Ditambahkan');
    }

    public function destroy($id){
        $data = Buku::find($id);
        $data->delete();
        return redirect('buku/dataBuku')->with('pesan','Data Buku Berhasil dihapus');;
    }

    public function edit($id){
        $kategori = Kategori::all();
        $buku = Buku::find($id);
        return view('buku.edit', compact('kategori', 'buku'));
    }

    public function update(Request $request, $id){
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->genre = $request->genre;
        $buku->sinopsis = $request->sinopsis;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->id_kategori = $request->id_kategori;
        $buku->buku_seo = Str::slug($request->judul);
       
        if ($request->foto!= NULL) {
            $oldfilename = $data->foto;
            $image_path = "thumb/" . $oldfilename;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $foto = $request->foto;
            $namafile = time() . '.' . $foto->getClientOriginalExtension();

            Image::make($foto)->resize(200, 150)->save('thumb/' . $namafile);
            $foto->move('images/', $namafile);

            $buku->foto = $namafile;
        }

        $buku->update();
        return redirect('buku/dataBuku')->with('pesan', 'Data Buku Berhasil diedit');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.search', compact('data_buku', 'no', 'jumlah_buku', 'cari'));
    }

    public function likefoto(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('suka');
        return back();
    }


}
