<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    public function artigo(){
        return $this->belongsTo('App\Atigos','id');
    }
}
