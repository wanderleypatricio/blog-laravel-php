<div class="row">
    <div class="input-field">
    <select name="tipo_id">
        @foreach($tipos as $tipo)
        <option value="{{$tipo->id}}" {{(
                isset($imovel->tipo_id)&& $imovel->tipo_id == $tipo->id ? 'selected':'')}}>
                {{$tipo->titulo}}</option>
        @endforeach
    </select>
    <label>
        Tipos:
    </label>
</div>
</div>
<div class="row">
<div class="input-field">
    <select name="cidade_id">
        @foreach($cidades as $cidade)
        <option value="{{$cidade->id}}" {{(
                isset($imovel->cidade_id)&& $imovel->cidade_id == $cidade->id ? 'selected':'')}}>
                {{$cidade->nome}}</option>
        @endforeach
    </select>
    <label>
        Cidades:
    </label>
</div>
</div>

<div class="input-field">
    <input type="text" name="titulo" class="validate "value="{{isset($imovel->titulo) ? $imovel->titulo : ''}}">
    <label>Titulo:</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validate" value="{{isset($imovel->descricao) ? $imovel->descricao : ''}}">
    <label>Descrição:</label>
</div>
<div class="row">
<div class="input-field">
    <select name="status">
        <option value="aluga">Aluga</option>
        <option value="vende">Vende</option>
    </select>
    <label>
        status:
    </label>
</div>
</div>
<div class="input-field">
    <input type="text" name="endereco" class="validate" value="{{isset($imovel->endereco) ? $imovel->endereco : ''}}">
    <label>Endereço:</label>
</div>
<div class="input-field">
    <input type="text" name="cep" class="validate" value="{{isset($imovel->cep) ? $imovel->cep : ''}}">
    <label>CEP:</label>
</div>
<div class="input-field">
    <input type="text" name="valor" class="validate" value="{{isset($imovel->valor) ? $imovel->valor : ''}}">
    <label>Valor:</label>
</div>
<div class="input-field">
    <input type="text" name="dormitorios" class="validate" value="{{isset($imovel->dormitorios) ? $imovel->dormitorios : ''}}">
    <label>Dormitórios:</label>
</div>
<div class="input-field">
    <select name="publicar">
        <option value="nao" {{(isset($imovel->publicar)&& $imovel->publicar == 'nao' ? 'selected':'')}}>Não</option>
        <option value="sim" {{(isset($imovel->publicar)&& $imovel->publicar == 'sim' ? 'selected':'')}}>Sim</option>

    </select>
    <label>
        Publicar:
    </label>
</div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <input type="file" name="imagem">
            arquivo
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate" >
        </div>

    </div>
    <div class="col m6 s12">
        @if(isset($imovel->imagem))
        <img src="{{asset($imovel->imagem)}}" width="120">
        @endif
    </div>

</div>

<div class="input-field">
    <textarea class="materialize-textarea" name="mapa" class="validate"></textarea>
    <label>Mapa:</label>

    <div class="col m6 s12">
        @if(isset($imovel->mapa))
        {!! $imovel->mapa !!}
        @endif
    </div>
</div>

  