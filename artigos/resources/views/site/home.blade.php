<link rel="stylesheet" href="{{asset('css.bootstrap.min.css')}}" type="txt/css">

@extends('layouts.site')

@section('content')
@include('layouts._site._slides')
<div class="container">
    @include('layouts._site._lista_artigos');
</div>
@endsection

<script src="{{asset('js.jquery.min.js')}}"></script>
<script src="{{asset('js.bootstrap.min.js')}}"></script>