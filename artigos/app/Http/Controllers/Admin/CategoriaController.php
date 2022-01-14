<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artigos;
use App\Categoria;


class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('admin.categoria.index', ['categorias' => $categorias]);
    }

    public function adicionar() {
        return view('admin.categoria.adicionar');
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $categoria = new Categoria();
        $categoria->categoria = $dados['categoria'];
        $categoria->save();

        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.categorias');
    }

    public function editar($id) {
        $artigos = Artigos::all();
        $categoria = Categoria::find($id);
        return view('admin.categoria.editar', ['categoria' => $categoria], ['artigos' => $artigos]);
    }

    public function atualizar(Request $request, $id) {
        $categoria = Categoria::find($id);
        $dados = $request->all();

        $categoria->id = $id;
        $categoria->categoria = $dados['categoria'];
        $categoria->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.categorias');
    }

    public function excluir($id) {
        if (Artigos::where('categoria_id', '=', $id)->count()) {
            \Session::flash('mensagem', ['msg' => 'Exite Imóveis relacionadas com essa cidade.\n Para excluir essa poder excluir exclua primeiro todos os imóveis relacionados com essa cidade.', 'class' => 'red white-text']);
        } else {
            $categoria = Categoria::find($id);
            $categoria->delete();
            \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
            return redirect()->route('admin.categorias');
        }
    }
}
