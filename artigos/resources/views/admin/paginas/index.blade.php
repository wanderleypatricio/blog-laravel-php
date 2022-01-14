@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Páginas</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Páginas</a>
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
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paginas as $pagina)
        <tr>
            <td>{{$pagina->id}}</td>
            <td>{{$pagina->titulo}}</td>
            <td>{{$pagina->descricao}}</td>
            <td>{{$pagina->tipo}}</td>
            <td>
                <a class="btn orange" href="{{route('admin.paginas.editar',$pagina->id)}}">Editar</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
</div>
    @endsection