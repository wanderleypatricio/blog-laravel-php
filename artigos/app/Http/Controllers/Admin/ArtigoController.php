<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artigos;
use App\Categoria;


class ArtigoController extends Controller
{
    public function index() {
        $artigos = Artigos::all();
        $categorias = Categoria::all();
        return view('admin.artigo.index', ['artigos' => $artigos],['categorias' => $categorias]);
    }

    public function adicionar() {
        $categorias = Categoria::all();
        return view('admin.artigo.adicionar',['categorias'=>$categorias]);
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $artigo = new Artigos();
        $artigo->categoria_id = '1';
        $artigo->titulo = $dados['titulo'];
        $artigo->texto = $dados['texto'];
        $artigo->save();

        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.artigos');
    }

    public function editar($id) {
        $artigo = Artigos::find($id);
        $categorias = Categoria::all();
        return view('admin.artigo.editar', ['artigo' => $artigo],['categorias' => $categorias]);
    }

    public function atualizar(Request $request, $id) {
        $artigo = Artigos::find($id);
        $dados = $request->all();

        $artigo->id = $id;
        $artigo->titulo = $dados['titulo'];
        $artigo->texto = $dados['texto'];
        $artigo->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.artigos');
    }

    public function excluir($id) {
        $artigo = Artigos::find($id);
        $artigo->delete();
        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.artigos');
        
    }

}
