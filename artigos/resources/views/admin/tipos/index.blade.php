@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Tipos</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Tipos</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tipos as $tipo)
        <tr>
            <td>{{$tipo->id}}</td>
            <td>{{$tipo->titulo}}</td>
            <td>
                <a class="btn orange" href="{{route('admin.tipos.editar',$tipo->id)}}">Editar</a>
                <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.tipos.excluir',$tipo->id)}}'}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.tipos.adicionar')}}">Novo Tipo</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection