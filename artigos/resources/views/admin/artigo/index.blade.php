@extends('layouts.app')
@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<div class="container">
    <br>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Artigos</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Título</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($artigos as $artigo)
        <tr>
            <td>{{$artigo->id}}</td>
            @foreach($categorias as $categoria)
            @if($artigo->categoria_id == $categoria->id)
            <td>{{$categoria->categoria}}</td>
            @endif
            @endforeach
            <td>{{$artigo->titulo}}</td>
            <td>
                <a class="btn orange" href="{{route('admin.artigo.editar',$artigo->id)}}">editar</a>
                <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.artigo.excluir',$artigo->id)}}'}">Excluir</a>
                <a style="width: 130px;float: left;" class="btn green" href="{{route('admin.galerias',$artigo->id)}}">Galeria</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.artigo.adicionar')}}">Novo Artigo</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        