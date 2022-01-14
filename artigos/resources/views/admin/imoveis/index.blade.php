@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="center">Lista de Imóveis</h1>
    <div class="row">
        <nav>
            <div class="nav-wrapper blue">
                <div class="col s12">
                    <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
                    <a href="#!" class="breadcrumb">Lista de Imóveis</a>
                </div>
            </div>
        </nav>
    </div>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Status</th>
            <th>Cidade</th>
            <th>Valor</th>
            <th>Imagem</th>
            <th>Publicado</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($imoveis as $imovel)
        <tr>
            <td>{{$imovel->id}}</td>
            <td>{{$imovel->titulo}}</td>
            <td>{{$imovel->status}}</td>
            <td>
                @foreach($cidades as $cidade)
                @if($imovel->cidade_id == $cidade->id)
                {{$cidade->nome}}
                @endif
                @endforeach
            </td>
            <td>R${{number_format($imovel->valor,2,",",".")}}</td>
            <td>
                <img src="{{asset($imovel->imagem)}}" width="100"></td>
            <td>{{$imovel->publicar}}</td>
            <td>
                <a style="width: 130px;padding-bottom: 3px;" class="btn orange" href="{{route('admin.imoveis.editar',$imovel->id)}}">Editar</a>
                <a style="width: 130px;float: left;" class="btn red" href="javascript:if(confirm('Deseja excluir este registro?')){window.location.href = '{{route('admin.imoveis.excluir',$imovel->id)}}'}">Excluir</a>
                <a style="width: 130px;float: left;" class="btn green" href="{{route('admin.galerias',$imovel->id)}}">Galeria</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a class="btn blue" href="{{route('admin.imoveis.adicionar')}}">Novo Imóvel</a>
            </td>
        </tr>
    </tfoot>
</table>
</div>
    @endsection