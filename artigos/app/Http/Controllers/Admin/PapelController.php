<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Papel;
class PapelController extends Controller
{
    public function index()
    {
        $papeis = Papel::all();
        return view('admin.papel.index', compact('papeis'));
    }
    
    public function adicionar()
    {
        return view('admin.papel.adicionar');
    }
    
    public function salvar(Request $request)
    {
        $papel = $request->all();
        Papel::create($papel);
        return redirect()->route('admin.papel');
    }
    
    public function editar($id)
    {
        if(Papel::find($id)->nome == "admin"){
            return redirect()->route('admin.papel');
        }else{
            $papel = Papel::find($id);
            return view('admin.papel.editar',  compact('papel'));
        }
    }
    
    public function atualizar(Request $request, $id)
    {
        
        if(Papel::find($id)->nome == "admin"){
            return redirect()->route('admin.papel');
        }
        Papel::find($id)->update($request->all());
        return redirect()->route('admin.papel');
    }
    
    public function excluir($id)
    {
        if(Papel::find($id)->nome == "admin"){
            return redirect()->route('admin.papel');
        }
        Papel::find($id)->delete();
        return redirect()->route('admin.papel');
    }
}
