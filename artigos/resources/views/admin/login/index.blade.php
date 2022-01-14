@extends('layouts.app')

@section('content')
<div class="container">
    <h4 align="center">Somente usuários cadastrados</h4>
    
    <div class="row">
    <div class="col s6 offset-s3">
      <div class="card grey lighten-4">
        <div class="card-content black-text">
    <form action="{{route('admin.login')}}" method="post">
        {{csrf_field()}}
        @include('admin.login._form')
        <button class="btn blue">Entrar</button>
    </form>
    </div>
    </div>
  </div>
</div>
@endsection