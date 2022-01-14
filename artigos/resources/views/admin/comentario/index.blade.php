@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Cidades</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Cidades</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Estado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cidades as $cidade)
        <tr>
            <td>{{$cidade->id}}</td>
            <td>{{$cidade->nome}}</td>
            <td>{{$cidade->uf}}</td>
            <td>
                <a class="btn orange" href="{{route('admin.cidades.editar',$cidade->id)}}">Editar</a>
                <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.cidades.excluir',$cidade->id)}}'}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.cidades.adicionar')}}">Nova Cidade</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection