@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Categorias</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Categorias</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->categoria}}</td>
            <td>
                <a class="btn orange" href="{{route('admin.categoria.editar',$categoria->id)}}">Editar</a>
                <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.categoria.excluir',$categoria->id)}}'}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.categoria.adicionar')}}">Nova Categoria</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection