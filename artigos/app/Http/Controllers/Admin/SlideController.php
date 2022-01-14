<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slide;
class SlideController extends Controller
{
    public function index() {
        $slides = Slide::all();
        return view('admin.slides.index', compact('slides'));
    }

    public function adicionar() {
        return view('admin.slides.adicionar');
    }

    public function salvar(Request $request) {
        $dados = $request->all();
        
        if (Slide::count()) {
            $slides = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slides->ordem;
        } else {
            $ordemAtual = 0;
        }

        if (isset($dados['imagens'])) {

            $arquivo = $request->file('imagens');
            foreach ($arquivo as $imagem) {
                $slide = new Slide();
                $rand = rand(11111, 99999);
                $diretorio = "img/slides/";
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $imagem->move($diretorio, $nomeArquivo);
                
                $slide->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $slide->imagem = $diretorio . "" . $nomeArquivo;

                $slide->save();
            }
        }



        \Session::flash('mensagem', ['msg' => 'Cadastrado com sucesso', 'class' => 'green white-text']);


        return redirect()->route('admin.slides');
    }

    public function editar($id) {
        $slide = Slide::find($id);
        return view('admin.slides.editar', compact('slide'));
    }

    public function atualizar(Request $request, $id) {
        $slide = Slide::find($id);
        $dados = $request->all();

        $slide->titulo = $dados['titulo'];
        $slide->descricao = $dados['descricao'];
        $slide->link = $dados['link'];
        $slide->ordem = $dados['ordem'];
        $slide->publicado = $dados['publicado'];

        
        if (isset($dados['imagem'])) {
            
            $file = $request->file('imagem');
            if ($file) {
                $rand = rand(11111, 99999);
                $diretorio = "img/slides/";
                $ext = $file->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $file->move($diretorio, $nomeArquivo);
            }
            $slide->imagem = $diretorio."".$nomeArquivo;
        }

        $slide->update();
        \Session::flash('mensagem', ['msg' => 'Dados alterados com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.slides');
    }

    public function excluir($id) {
        $slide = Slide::find($id);
        $slide->delete();

        \Session::flash('mensagem', ['msg' => 'Dados excluídos com sucesso', 'class' => 'green white-text']);
        return redirect()->route('admin.slides');
    }
}
