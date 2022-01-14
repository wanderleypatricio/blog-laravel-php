@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h2 align='center'>Sobre</h2>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m6">
            <img src="{{$sobre->imagem}}" class="responsive-img">
        </div>
        <div class="col s12 m6">
            <h4>{{$sobre->titulo}}</h4>
            <blockquote> 
                <p>{{$sobre->descricao}}</p>
                <p>{{$sobre->texto}}</p>
                
            </blockquote>
        </div>
    </div>
    
</div>
<div class="container">
    <div class="row">
        <div class="video-container">
            @if(isset($sobre->mapa))
            {!! $sobre->mapa !!}
            @endif
        </div>
    </div>
</div>
@endsection
