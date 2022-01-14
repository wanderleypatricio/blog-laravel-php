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
                    <a href="{{route('admin.artigos')}}" class="breadcrumb">listar Artigo</a>
                    <a class="breadcrumb">Alterar Artigo</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.artigo.atualizar', $artigo->id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.artigo._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
@endsection