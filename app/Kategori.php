<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = "id";
    protected $fillable= ['foto','kategori_seo','nama_kategori', 'keterangan'];

    public function bukus(){
        return $this->hasMany('App\Buku', 'id_kategori', 'id');
    }

}
