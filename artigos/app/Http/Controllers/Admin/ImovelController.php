<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use App\Cidade;
class ImovelController extends Controller
{
    public function index() {
        $imoveis = Imovel::all();
        $tipos = Tipo::all();
        $cidades = Cidade::all();
        return view('admin.imoveis.index', compact('imoveis','cidades'));
    }

    public function adicionar() {
        $tipos = Tipo::all();
        $cidades =Cidade::all();
        return view('admin.imoveis.adicionar',['tipos' => $tipos],['cidades' => $cidades]);
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        $imovel = new Imovel();
        $imovel->tipo_id = $dados['tipo_id'];
        $imovel->cidade_id = $dados['cidade_id'];
        $imovel->titulo = $dados['titulo'];
        $imovel->descricao = $dados['descricao'];
        $imovel->status = $dados['status'];
        $imovel->endereco = $dados['endereco'];
        $imovel->cep = $dados['cep'];
        $imovel->valor = $dados['valor'];
        $imovel->dormitorios = $dados['dormitorios'];
        $imovel->publicar = $dados['publicar'];
        $imovel->visualizacoes = 0;
        if(isset($imovel->mapa)){
            $imovel->mapa = $dados['mapa'];
        }else{
            $imovel->mapa = null;
        }
        
        if (isset($dados['imagem'])) {
            
            $file = $request->file('imagem');
            if ($file) {
                $rand = rand(11111, 99999);
                $diretorio = "img/imoveis/" . str_slug($dados['titulo'],'_'). "/";
                $ext = $file->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $file->move($diretorio, $nomeArquivo);
            }
            $imovel->imagem = $diretorio."".$nomeArquivo;
        }
        
        $imovel->save();

        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.imoveis');
    }

    public function editar($id) {
        $imovel = Imovel::find($id);
        $tipos = Tipo::all();
        $cidades =Cidade::all();
        return view('admin.imoveis.editar',['imovel' => $imovel],  compact('tipos','cidades'));
        
    }

    public function atualizar(Request $request, $id) {
        $imovel = Imovel::find($id);
        $dados = $request->all();
        $imovel->tipo_id = $dados['tipo_id'];
        $imovel->cidade_id = $dados['cidade_id'];
        $imovel->titulo = $dados['titulo'];
        $imovel->descricao = $dados['descricao'];
        $imovel->status = $dados['status'];
        $imovel->endereco = $dados['endereco'];
        $imovel->cep = $dados['cep'];
        $imovel->valor = $dados['valor'];
        $imovel->dormitorios = $dados['dormitorios'];
        $imovel->publicar = $dados['publicar'];
        
        if(isset($imovel->mapa)){
            $imovel->mapa = $dados['mapa'];
        }else{
            $imovel->mapa = null;
        }
        
        if (isset($dados['imagem'])) {
            
            $file = $request->file('imagem');
            if ($file) {
                $rand = rand(11111, 99999);
                $diretorio = "img/imoveis/" . str_slug($dados['titulo'],'_'). "/";
                $ext = $file->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $file->move($diretorio, $nomeArquivo);
            }
            $imovel->imagem = $diretorio."".$nomeArquivo;
        }
        
        $imovel->save();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.imoveis');
    }

    public function excluir($id) {
            $imovel = Imovel::find($id);
            $Imovel->delete();
            \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
            return redirect()->route('admin.imoveis');
        
    }
}
