@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="center">Alterar Cidades</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.cidades')}}" class="breadcrumb">Alterar Cidades</a>
                    <a class="breadcrumb">Adiciona Cidades</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.cidades.atualizar',$cidade->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.cidades._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
@endsection