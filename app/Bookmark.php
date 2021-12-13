<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'bookmark';
    
    public function bookmarks(){
        return $this->belongsTo('App\Buku', 'id_buku', 'id');
    }
}
