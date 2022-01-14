@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="center">Adicionar Categoria</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.categorias')}}" class="breadcrumb">Lista de Categorias</a>
                    <a href="#" class="breadcrumb">Adiciona Categoria</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.categoria.salvar')}}" method="post">
            {{csrf_field()}}
            @include('admin.categoria._form')
            <button class="btn blue">
                Adicionar
            </button>
        </form>
    </div>
</div>
@endsection