@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Papeis</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Papeis</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($papeis as $papel)
        <tr>
            <td>{{$papel->id}}</td>
            <td>{{$papel->nome}}</td>
            <td>{{$papel->descricao}}</td>
            <td>
                @if($papel->nome != 'admin')
                    <a class="btn orange" href="{{route('admin.papel.editar',$papel->id)}}">Editar</a>
                    <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.papel.excluir',$papel->id)}}'}">Excluir</a>
                @else
                    <a class="btn orange disabled">Editar</a>
                    <a class="btn red disabled">Excluir</a>
                @endif
                
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.papel.adicionar')}}">Novo Papel</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection