@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Slides</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista Slides</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Ordem</th>
            <th>Publicado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($slides as $slide)
        <tr>
            <td>{{$slide->id}}</td>
            <td>{{$slide->titulo}}</td>
            <td>{{$slide->descricao}}</td>
            
            <td>
                <img src="{{ asset($slide->imagem)}}" width="100">
            </td>
            <td>{{$slide->ordem}}</td>
            <td>{{$slide->publicado}}</td>
            <td>
                <a style="width: 130px;padding-bottom: 3px;" class="btn orange" href="{{route('admin.slides.editar',$slide->id)}}">Editar</a>
                <a style="width: 130px;float: left;" class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.slides.excluir',$slide->id)}}'}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.slides.adicionar')}}">Novo Slide</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection