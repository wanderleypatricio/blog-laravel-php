<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artigos;
use App\Categoria;
use App\Slide;
use App\User;
use Illuminate\Support\Facades\DB;

class ArtigosController extends Controller
{
    public function index()
    {
        $artigos = Artigos::all();
        $categorias = Categoria::all();
        $galeria = $artigos->galeria()->orderBy('ordem')->get();
        return view('site.artigo', compact('artigos','galeria','categorias'));
    }
    public function show($id)
    {
        $autor = User::all();
        $artigo = Artigos::find($id);
        $categorias = Categoria::all();
        $galeria = $artigo->galeria()->orderBy('ordem')->get();
        return view('site.artigo', compact('artigo','galeria','categorias','autor'));
    }

    public function listaArtigosPorCategoriaID($id){
        //$artigo = Artigos::where('categoria_id','=',$id)->paginate(20);
        $slides = Slide::orderBy('ordem')->get();
        $categorias = Categoria::orderBy('categoria')->get();
        $artigos = DB::table('artigos')
        ->join('galerias','artigos.id','=','galerias.artigo_id')->where('ordem','=','1')
        ->join('categorias','artigos.categoria_id','=','categorias.id')->where('categorias.id','=',$id)
        ->select('artigos.*', 'galerias.imagem','categorias.id', 'categorias.categoria')->paginate(20);
        return view('site.home', compact('artigos','slides','categorias'));
    }
}
