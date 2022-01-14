@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="center">Alterar Tipos</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.tipos')}}" class="breadcrumb">Alterar Tipos</a>
                    <a class="breadcrumb">Adiciona Tipos</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.tipos.atualizar',$tipo->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.tipos._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
@endsection