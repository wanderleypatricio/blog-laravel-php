@extends('layouts.app')

@section('content')

<script src="{{asset('ckeditor4/ckeditor.js')}}"></script>
<div class="container">
    <br>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.artigos')}}" class="breadcrumb">Lista de artigos</a>
                    <a href="#" class="breadcrumb">Adiciona Artigo</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.artigo.salvar')}}" method="post">
            {{csrf_field()}}
            @include('admin.artigo._form')
            <button class="btn blue">
                Adicionar
            </button>
        </form>
    </div>
</div>
@endsection