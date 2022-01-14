<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Imovel;

class CidadeController extends Controller {

    public function index() {
        $cidades = Cidade::all();
        return view('admin.cidades.index', ['cidades' => $cidades]);
    }

    public function adicionar() {
        return view('admin.cidades.adicionar');
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $cidade = new Cidade();
        $cidade->nome = $dados['nome'];
        $cidade->uf = $dados['uf'];
        $cidade->save();

        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.cidades');
    }

    public function editar($id) {
        $cidade = Cidade::find($id);
        return view('admin.cidades.editar', ['cidade' => $cidade]);
    }

    public function atualizar(Request $request, $id) {
        $cidade = Cidade::find($id);
        $dados = $request->all();

        $cidade->id = $id;
        $cidade->nome = $dados['nome'];
        $cidade->uf = $dados['uf'];
        $cidade->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.cidades');
    }

    public function excluir($id) {
        if (Imovel::where('cidade_id', '=', $id)->count()) {
            \Session::flash('mensagem', ['msg' => 'Exite Imóveis relacionadas com essa cidade.\n Para excluir essa poder excluir exclua primeiro todos os imóveis relacionados com essa cidade.', 'class' => 'red white-text']);
        } else {
            $cidade = Cidade::find($id);
            $cidade->delete();
            \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
            return redirect()->route('admin.cidades');
        }
    }

}
