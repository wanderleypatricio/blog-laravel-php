@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h2 align='center'>Contato</h2>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m6">
            <img src="{{$contato->imagem}}" class="responsive-img">
        </div>
        <div class="col s12 m5">
            <h4>{{$contato->titulo}}</h4>
            <blockquote>
                {{$contato->descricao}}
            </blockquote>
            <form class="col s12" action="{{route('site.contato.enviar')}}" method="post">
                {{csrf_field()}}
                <div class="input-field">
                    <input type="text" name="nome" class="validate">
                    <label>Nome:</label>
                </div>
                <div class="input-field">
                    <input type="text" name="email" class="validate">
                    <label>E-mail:</label>
                </div>
                <div class="input-field">
                    <textarea name="mensagem" class="materialize-textarea"></textarea>
                    <label>Mensagem:</label>
                </div>
                <button class="btn blue">Enviar</button>
            </form>
        </div>
    </div>
    
</div>
@endsection
