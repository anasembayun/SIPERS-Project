<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('is_admin');


//pustakawan
Route::group(['middleware' => ['is_admin']], function() {

Route::get('/pustakawan/dashboard', 'PustakawanController@dashboard')->name('pustakawan.dashboard');

Route::get('/pustakawan/dataAnggota', 'PustakawanController@dataAnggota')->name('pustakawan.dataAnggota');

//Kategori route

Route::get('/kategori/index', 'KategoriController@index')->name('kategori.index');

Route::get('/kategori/create', 'KategoriController@create')->name('kategori.create');

Route::post('/kategori/store', 'KategoriController@store')->name('kategori.store');

Route::post('/kategori/update/{id}', 'KategoriController@update')->name('kategori.update');

Route::get('/kategori/edit/{id}', 'KategoriController@edit')->name('kategori.edit');

Route::get('/kategori/delete/{id}', 'KategoriController@destroy')->name('kategori.destroy');

//Buku
Route::get('/buku/dataBuku', 'BukuController@dataBuku')->name('buku.dataBuku');

Route::get('/buku/search', 'BukuController@search')->name('buku.search');

Route::get('/buku/create', 'BukuController@create')->name('buku.create');

Route::post('/buku/store', 'BukuController@store')->name('buku.store');

Route::post('/buku/update/{id}', 'BukuController@update')->name('buku.update');

Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');

Route::get('/buku/delete/{id}', 'BukuController@destroy')->name('buku.destroy');
});

//Anggota
Route::group(['middleware' => ['auth']], function() {

Route::get('/anggota/listkategori', 'AnggotaController@listKategori')->name('anggota.listkategori');

Route::get('/anggota/semuaBuku', 'AnggotaController@semuaBuku')->name('anggota.semuaBuku');

Route::get('/anggota/home', 'AnggotaController@home')->name('anggota.home');

Route::get('/detailBuku/{title}', 'AnggotaController@detail')->name('detailBuku.detail');

Route::get('/listbuku/{title}', 'KategoriController@listBuku')->name('listbuku.buku');

Route::get('/listbuku1/{id}', 'BukuController@likefoto')->name('buku.like');

Route::resource('bookmark', 'BookmarkController');

});

//layout

Route::get('/layouts/master', 'PustakawanController@master')->name('layouts.master');

Route::get('/layouts/main', 'PustakawanController@main')->name('layouts.main');