<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $primarykey ='id';
    protected $fillable = ['id', 'judul', 'isi','image', 'created_at', 'updated_at'];
}
