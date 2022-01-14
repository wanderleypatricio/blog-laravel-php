<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paginas;

class PaginaController extends Controller {

    public function index() {
        $pagina = Paginas::all();
        return view('admin.paginas.index', ['paginas' => $pagina]);
    }

    public function editar($id) {
        $pagina = Paginas::find($id);
        return view('admin.paginas.editar', ['paginas' => $pagina]);
    }

    public function atualizar(Request $request, $id) {
        $dados = $request->all();
        $pagina = Paginas::find($id);
        $pagina->titulo = $dados['titulo'];
        $pagina->descricao = $dados['descricao'];
        $pagina->texto = $dados['texto'];
        $pagina->tipo = $dados['tipo'];
        
        if (isset($dados['mapa'])) {
            $pagina->mapa = $dados['mapa'];
        }
        
        if (isset($dados['imagem'])) {
            
            $file = $request->file('imagem');
            if ($file) {
                $rand = rand(11111, 99999);
                $diretorio = "img/paginas/" . $id . "/";
                $ext = $file->guessClientExtension();
                $nomeArquivo = "img_" . $rand . "." . $ext;
                $file->move($diretorio, $nomeArquivo);
            }
            $pagina->imagem = $diretorio."".$dados['imagem'];
        }

        $pagina->update();
        \Session::flash('mensagem',['msg'=>'Registro Atualizado com sucesso!','class'=>'red white-text']);
        return redirect()->route('admin.paginas');
    }

}
