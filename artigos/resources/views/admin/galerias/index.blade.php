@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Imagens do Artigo</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.artigos')}}" class="breadcrumb">Lista Artigos</a>
                    <a href="" class="breadcrumb">{{$artigo->titulo}}</a>
                    <a href="#!" class="breadcrumb">Lista de Imagens</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Imagem</th>
            <th>Ordem</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($galeria as $img)
        <tr>
            <td>{{$img->id}}</td>
            <td>
                <img src="{{ asset($img->imagem)}}" width="100">
            </td>
            <td>{{$img->ordem}}</td>
            <td>
                <a style="width: 130px;padding-bottom: 3px;" class="btn orange" href="{{route('admin.galerias.editar',$img->id)}}">Editar</a>
                <a style="width: 130px;float: left;" class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.galerias.excluir',$img->id)}}'}">Excluir</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.galerias.adicionar',$artigo->id)}}">Nova Imagem</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection