<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galeria;
Use App\Artigos;

class GaleriaController extends Controller {

    public function index($id) {
        $artigo = Artigos::find($id);
        $galeria = $artigo->galeria()->orderBy('ordem')->get();
        return view('admin.galerias.index', compact('galeria', 'artigo'));
    }

    public function adicionar($id) {
        $artigo = Artigos::find($id);
        return view('admin.galerias.adicionar', compact('artigo'));
    }

    public function salvar(Request $request, $id) {
        $dados = $request->all();
        $artigo = Artigos::find($id);
        $galeria = new Galeria();
        $galeria->artigo_id = $artigo->id;

        if ($artigo->galeria()->count()) {
            $galeria = $artigo->galeria()->orderBy('ordem', 'desc')->first();
            $ordemAtual = $galeria->ordem;
        } else {
            $ordemAtual = 0;
        }

        if (isset($dados['imagens'])) {

            $arquivo = $request->file('imagens');
            foreach ($arquivo as $imagem) {
                $galeria = new Galeria();
                $rand = rand(11111, 99999);
                $diretorio = "img/artigo/" . $artigo->id . "/";
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $imagem->move($diretorio, $nomeArquivo);
                $galeria->artigo_id = $artigo->id;
                $galeria->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $galeria->imagem = $diretorio . "" . $nomeArquivo;

                $galeria->save();
            }
        }



        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.galerias', $artigo->id);
    }

    public function editar($id) {
        $galeria = Galeria::find($id);
        $artigo = $galeria->artigo;
        return view('admin.galerias.editar', compact('galeria', 'artigo'));
    }

    public function atualizar(Request $request, $id) {
        $galeria = Galeria::find($id);
        $dados = $request->all();

        $galeria->titulo = $dados['titulo'];
        $galeria->descricao = $dados['descricao'];
        $galeria->ordem = $dados['ordem'];

        $artigo = $galeria->artigo;

        $galeria->artigo_id = $artigo->id;
        
        if (isset($dados['imagem'])) {
            
            $file = $request->file('imagem');
            if ($file) {
                $rand = rand(11111, 99999);
                $diretorio = "img/imoveis/" . $artigo->id. "/";
                $ext = $file->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $file->move($diretorio, $nomeArquivo);
            }
            $galeria->imagem = $diretorio."".$nomeArquivo;
        }

        $galeria->update();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.galerias', $artigo->id);
    }

    public function excluir($id) {
        $galeria = Galeria::find($id);
        $artigo = $galeria->artigo;
        $galeria->delete();

        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.galerias', $artigo->id);
    }

}
