<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function artigos()
    {
        return $this->hasMany('App\Artigos','categoria_id');
    }
}
