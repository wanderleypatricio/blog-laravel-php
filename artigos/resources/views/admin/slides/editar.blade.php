@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="center">Alterar Slide</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admin.slides',$slide->id)}}" class="breadcrumb">Slides</a>
                    <a class="breadcrumb">Alterar Slide</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <form action="{{route('admin.slides.atualizar',$slide->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put">
            @include('admin.slides._form')
            <button class="btn blue">
                Atualizar
            </button>
        </form>
    </div>
</div>
@endsection