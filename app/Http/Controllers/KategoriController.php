<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Kategori;
use file;
use Image;

class KategoriController extends Controller
{
    public function index(){
        $batas = 8;
        $kategori = Kategori::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($kategori->currentPage() - 1);
        return view('kategori.index', compact('kategori', 'no'));
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){
        $this->validate($request,[
        'nama_kategori' => 'required|string',
        'foto' => 'required|mimes:jpeg,jpg,png'
        ]);
        $data = new Kategori;
        $data->nama_kategori = $request->nama_kategori; 
        $data->keterangan = $request->keterangan;
        $data->kategori_seo = Str::slug($request->nama_kategori);

        $foto = $request->foto;
        $namafile = time().'.'. $foto->getClientOriginalExtension();
        Image::make($foto)->resize(150,150)->save('thumb/'.$namafile);
        $foto->move('image/', $namafile);
        $data->foto = $namafile;
        $data->save();
        return redirect('kategori/index')->with('pesan','Data Kategori Berhasil disimpan');
    }
    public function destroy($id){
        $data = Kategori::find($id);
        $data->delete();
        return redirect('kategori/index')->with('pesan','Data Kategori Berhasil dihapus');;
    }

    public function edit($id){
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = Kategori::find($id);
        $data->nama_kategori = $request->nama_kategori; 
        $data->keterangan = $request->keterangan;
        $data->kategori_seo = Str::slug($request->nama_kategori);
        
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

            $data->foto = $namafile;
        }

        $data->update();
        return redirect('kategori/index')->with('pesan', 'Data Kategori Berhasil diedit');
    }

    public function listBuku($title){
        $kategoris = Kategori::where('kategori_seo', $title)->first();
        $bukus = $kategoris->bukus()->orderBy('judul', 'asc')->paginate(6);
        $buku_suka = $kategoris->bukus()->orderBy('suka', 'desc')->paginate(6);
        $buku_new = $kategoris->bukus()->orderBy('id', 'desc')->paginate(6);
        return view('listbuku.buku', compact('bukus', 'kategoris', 'buku_suka', 'buku_new'));
    }


}
