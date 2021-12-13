<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    
    public function kategoris(){
        return $this->belongsTo('App\Kategori', 'id_kategori', 'id');
    }
}
