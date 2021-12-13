<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Buku;
use App\Kategori;
use App\User;

class PustakawanController extends Controller
{
    public function master(){
        return view('layouts.master');
    }

    public function main(){
        return view('layouts.main');
    }

    public function dashboard(){
        $data_anggota = User::where('is_admin', NULL)->get()->count();
        $data_admin = User::where('is_admin', 1)->get()->count();
        $kategori = Kategori::count();
        $buku = Buku::count();
        return view('pustakawan.dashboard', compact('data_anggota', 'data_admin', 'kategori' ,'buku'));
    }

    public function dataAnggota(){
        $batas = 8;
        $data_anggota = User::where('is_admin', NULL)->get();
        $no = 0;
        return view('pustakawan.dataAnggota', compact('data_anggota', 'no'));
    }

}
