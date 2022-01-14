@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="center">Alterar Imagem</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.artigos')}}" class="breadcrumb">Lista de Imóveis</a>
                    <a href="{{route('admin.artigo',$galeria->artigo_id)}}" class="breadcrumb">{{$artigo->titulo}}</a>
                    <a href="{{route('admin.galerias',$galeria->id)}}" class="breadcrumb">Imagens</a>
                    <a class="breadcrumb">Alterar imagem do Imóvel</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.galerias.atualizar',$galeria->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.galerias._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
@endsection