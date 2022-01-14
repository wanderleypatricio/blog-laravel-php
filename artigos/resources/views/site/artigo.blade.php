@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
        <h2 align='center'>{{$artigo->titulo}}</h2>
        <div class="divider"></div>
    </div>
    <div class="row section">
        <div class="col s12 m8">
            @if($artigo->galeria()->count())
            <div class="row">
                <div class="slider">
                    <ul class="slides">
                        @foreach($galeria as $imagem)
                        
                        <li><img src="{{asset($imagem->imagem)}}">
                            
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <div class="row" align="center">
                <button class="btn blue" onclick="sliderPrev()"><<</button>
                <button class="btn blue" onclick="sliderNext()">>></button>
            </div>
            @else
            <img class="responsive-img" src="{{asset($artigo->imagem)}}" width="400px">
            @endif
        </div>
        <div class="col s12 m4">
            <p><b>Autor:</b> {{$autor[0]->name}}</p>
            <p><b>E-mail:</b> {{$autor[0]->email}}</p>
            <a class="btn deep-orange darken-1" href="{{route('site.contato')}}">Perfil</a>
            <p><b>Data de publicação:</b> {{$artigo->created_at}}</p>
        </div>
    </div>
    <div class="section">
        
        <div class="col s12 m4">
            <h4>Conteúdo:</h4>
            <p>
                {{$artigo->texto}}
            </p>
        </div>
        <div class="col s12 m8">
            
        </div>
    </div>
</div>
@endsection
