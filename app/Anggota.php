<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = "id";
    protected $fillable= ['foto','nama','nim','jurusan'];
}

