<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artigos;
use App\Slide;
use App\Tipo;
use App\Galeria;
use App\Categoria;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    public function index() {
        $slides = Slide::orderBy('ordem')->get();
        $artigos = DB::table('artigos')->join('galerias','artigos.id','=','galerias.artigo_id')->where('ordem','=','1')->select('artigos.*', 'galerias.imagem')->paginate(20);
        $tipos = Tipo::orderBy('titulo')->get();
        $categorias = Categoria::orderBy('categoria')->get();
        return view('site.home', compact('artigos', 'slides', 'tipos', 'categorias'));
    }

    public function busca(Request $request) {
        $busca = $request->all();

        $slides = Slide::orderBy('ordem')->get();

        if ($busca['status'] == "null") {
            $status = [
                ['status', '<>', null]
            ];
        } else {
            $status = [
                ['status', '=', $busca['status']]
            ];
        }

        if ($busca['tipo'] == "null") {
            $tipo = [
                ['tipo_id', '<>', null]
            ];
        } else {
            $tipo = [
                ['tipo_id', '=', $busca['tipo']]
            ];
        }

        if ($busca['cidade'] == "null") {
            $cidade = [
                ['cidade_id', '<>', null]
            ];
        } else {
            $cidade = [
                ['cidade_id', '=', $busca['cidade']]
            ];
        }

        $dormitorios = [
            ['dormitorios', '<>', null],
            ['dormitorios', '=', 1],
            ['dormitorios', '=', 2],
            ['dormitorios', '=', 3],
            ['dormitorios', '=', 4],
            ['dormitorios', '>', 4],
        ];

        $indiceDormitorio = $busca['dormitorios'];
        
        $valor= [
            ['valor', '>', 0],
            ['valor', '<=', 500],
            [['valor', '>=', 500],['valor','<=',1000]],
            [['valor', '>=', 1000],['valor','<=',5000]],
            [['valor', '>=', 15000],['valor','<=',10000]],
            
        ];

        $indiceValor = $busca['preco'];



        $imoveis = Imovel::where('publicar', '=', 'sim')
                        ->where($status)
                        ->where($tipo)
                        ->where($cidade)
                        ->where([$dormitorios[$indiceDormitorio]])
                        ->where([$valor[$indiceValor]])
                        ->orderBy('id', 'desc')->paginate(20);
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();
        return view('site.home', compact('busca', 'imoveis', 'slides', 'tipos', 'cidades'));
    }

}
