<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller {

    public function index() {
        $tipos = Tipo::all();
        return view('admin.tipos.index', ['tipos' => $tipos]);
    }

    public function adicionar() {
        return view('admin.tipos.adicionar');
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $tipo = new Tipo();
        $tipo->titulo = $dados['titulo'];
        $tipo->save();

        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.tipos');
    }

    public function editar($id) {

        $tipo = Tipo::find($id);
        return view('admin.tipos.editar', ['tipo' => $tipo]);
    }

    public function atualizar(Request $request, $id) {
        $tipo = Tipo::find($id);
        $dados = $request->all();

        $tipo->id = $id;
        $tipo->titulo = $dados['titulo'];
        $tipo->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.tipos');
    }

    public function excluir($id) {
        if (Imovel::where('tipo_id', '=', $id)->count()) {
            \Session::flash('mensagem', ['msg' => 'Não é possivel excluir esse tipo de imóvel pois ele está relaciona'
                . ' do a um ou mais imóveis cadastrados.\n Exclua primeiro os imóveis relacionados.', 'class' => 'red white-text']);
        } else {
            $tipo = Tipo::find($id);
            $tipo->delete();
            \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
            return redirect()->route('admin.tipos');
        }
    }

}
