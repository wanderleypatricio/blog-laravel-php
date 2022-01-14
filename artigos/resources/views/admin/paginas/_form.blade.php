<div class="input-field">
    <input type="text" name="titulo" class="validate"value="{{isset($paginas->titulo) ? $paginas->titulo : ''}}">
    <label>Título</label>
</div>
<div class="input-field">
    <textarea class="materialize-textarea" name="descricao" class="validate">{{isset($paginas->descricao) ? $paginas->descricao : ''}}</textarea>
    <label>Descrição:</label>
</div>
<div class="input-field">
    <input type="text" name="tipo" class="validate"value="{{isset($paginas->tipo) ? $paginas->tipo : ''}}">
    <label>Típo</label>
</div>
<div class="input-field">
    <textarea class="materialize-textarea" name="texto" class="validate">{{isset($paginas->texto) ? $paginas->texto : ''}}</textarea>
    <label>Texto:</label>
</div>

<div class="input-field">
        @if(isset($paginas->email))
        <input type="email" name="email" value="{{asset($paginas->email)}}" >
        @endif
    </div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <input type="file" name="imagem">

        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate" >
        </div>

    </div>
    <div class="col m6 s12">
        @if(isset($paginas->imagem))
        <img src="{{asset($paginas->imagem)}}" width="120">
        @endif
    </div>
    
</div>

<div class="input-field">
    <textarea class="materialize-textarea" name="mapa" class="validate"></textarea>
    <label>Mapa:</label>

    <div class="col m6 s12">
        @if(isset($paginas->mapa))
        {!! $paginas->mapa !!}
        @endif
    </div>
</div>