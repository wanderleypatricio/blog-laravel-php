@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Usuários</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Usuários</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>
                <a class="btn orange" href="{{route('admin.usuarios.editar',$usuario->id)}}">Editar</a>
                <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.usuarios.excluir',$usuario->id)}}'}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.usuarios.adicionar')}}">Novo usuário</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection