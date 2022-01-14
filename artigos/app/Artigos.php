<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigos extends Model
{
    public function categoria()
    {
        return $this->belongsTo('App\Categoria','id');
    }

    public function galeria(){
        return $this->hasMany('App\Galeria','artigo_id');
    }
}
