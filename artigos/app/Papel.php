<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];
    
    public function permisoes()
    {
        return $this->belongsToMany('App\Permissao');  
    }
}
