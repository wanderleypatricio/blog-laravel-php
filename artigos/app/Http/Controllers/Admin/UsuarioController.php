<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Papel;
class UsuarioController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
            \Session::flash('mensagem',['msg'=>'Login realizado com sucesso','class'=>'green white-text']);
            return redirect()->route('admin.principal');
        }
        \Session::flash('mensagem',['msg'=>'e-mail e/ou senha incorretos','class'=>'red white-text']);
        return redirect()->route('admin.login');
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios.index', ['usuarios'=>$usuarios]);
    }
    
    public function adicionar(){
        return view('admin.usuarios.adicionar');
    }
    
    public function salvar(Request $request){
        $dados = $request->all();
        $usuario = new User();
        $usuario->name = $dados['nome'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();
        
        \Session::flash('mensagem',['msg'=>'Cadastrado com sucesso','class'=>'green white-text']);
            
            
        return redirect()->route('admin.usuarios');
    }
    
    public function editar($id){
        
        $usuario = User::find($id);
        return view('admin.usuarios.editar', ['usuario'=>$usuario]);
    }
    
    public function atualizar(Request $request, $id){
        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password']) > 5){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
           
        }
        
        $usuario->id = $id;
        $usuario->name = $dados['nome'];
        $usuario->email = $dados['email'];
        if(isset($dados['password'])){
            $usuario->password = $dados['password'];
        }
        $usuario->save();
        \Session::flash('mensagem',['msg'=>'Dados alterados com sucesso','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }
    
    public function excluir($id){
        $usuario = User::find($id);
        $usuario->delete();
        \Session::flash('mensagem',['msg'=>'Dados excluídos com sucesso','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }
    
    public function papel($id)
    {
        $ususario = User::find($id);
        $papel = Papel::all();
        return view('admin.usuarios.papel', compact('usuario','papel'));
    }
    
    public function salvarPapel(Resquest $request, $id)
    {
        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);
        return redirect()->back();
    }
    
    public function removerPapel($id, $papel_id){
        $usuario = User::find($id);
        
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        return redirect()->back();
    }
}
