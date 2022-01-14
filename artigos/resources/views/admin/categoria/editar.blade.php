@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="center">Alterar Categoria</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.categorias')}}" class="breadcrumb">Alterar Categoria</a>
                    <a class="breadcrumb">Adiciona Categoria</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.categoria.atualizar',$categoria->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.categoria._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
@endsection