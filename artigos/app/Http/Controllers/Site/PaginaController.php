<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Paginas;
class PaginaController extends Controller
{
    public function sobre(){
        $pagina = Paginas::where('tipo','=','sobre')->first();
        return view('site.sobre', ['sobre'=>$pagina]);
    }
    public function contato(){
        $pagina = Paginas::where('tipo','=','contato')->first();
        return view('site.contato', ['contato'=>$pagina]);
    }
    
    public function enviarContato(Request $request){
        $pagina = Paginas::where('tipo','=','contato')->first();
        $email = $pagina->email;
        \Mail::send('emails.contato',['request'=>$request],function($m)use($request,$email){
            $m->from($request['email'], $request['nome']);
            $m->replyTo($request['email'], $request['nome']);
            $m->subject("Contato pelo site");
            $m->to($email, 'Contato do site');
        });
        \Session::flash('mensagem',['msg'=>'Mensagem enviada!','class'=>'red white-text']);
        return redirect()->route('site.contato');
    }
}
