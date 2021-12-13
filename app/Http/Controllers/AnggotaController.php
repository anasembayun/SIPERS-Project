<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Kategori;
use App\Buku;
use file;
use Image;

class AnggotaController extends Controller
{
    public function home(){
        return view('anggota.home');
    }

    public function semuaBuku(){
        $batas = 15;
        $data_buku = Buku::orderBy('judul', 'asc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $buku_suka = Buku::orderBy('suka', 'desc')->paginate(6);
        $buku_new = Buku::orderBy('id', 'desc')->paginate(6);
        return view('anggota.semuaBuku', compact('data_buku', 'no', 'buku_suka', 'buku_new'));
    }

    public function listKategori(){
        $batas = 4;
        $kategori = Kategori::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($kategori->currentPage() - 1);
        return view('anggota.listkategori', compact('kategori', 'no'));
    }

    public function detail($title){
        $buku = Buku::where('judul', $title)->first();
        return view('detailBuku.detail', compact('buku'));
    }
}
