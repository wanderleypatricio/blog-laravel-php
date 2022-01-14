@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Papéis</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Minha Lista de Papéis</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.usuarios.papel.salvar', $usuario->id)}}" method="post">
            {{csrf_field()}}
            <div class='input-field'>
                <select name='papel_id'>
                    @foreach($papel as $valor)
                    <option value="{{$valor->id}}">{{$valor->nome}}</option>
                    @endforeach
                </select>
            </div>
        </form>
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
        @foreach($usuario->papeis as $papel)
        <tr>
            <td>{{$papel->name}}</td>
            <td>{{$papel->descricao}}</td>
            <td>
                <a class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.usuarios.papel.remover',[$usuario->id,$papel->id])}}'}">Excluir</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        
    </tfoot>
</table>
</div>
    @endsection