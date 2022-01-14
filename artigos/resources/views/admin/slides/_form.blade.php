@if(isset($slide->imagem))
<div class="input-field">
    <input type="text" name="titulo" class="validate "value="{{isset($slide->titulo) ? $slide->titulo : ''}}">
    <label>Titulo:</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validate" value="{{isset($slide->descricao) ? $slide->descricao : ''}}">
    <label>Descrição:</label>
</div>
<div class="input-field">
    <input type="text" name="ordem" class="validate" value="{{isset($slide->ordem) ? $slide->ordem : ''}}">
    <label>Ordem:</label>
</div>
<div class="input-field">
    <input type="text" name="link" class="validate" value="{{isset($slide->link) ? $slide->link : ''}}">
    <label>Link:</label>
</div>
<div class="input-field">
    <select name="publicado" >
        <option value="nao" {{(isset($slide->publicado) && $slide->publicado == 'nao' ? 'selected': '')}}">Não</option>
        <option value="sim" {{(isset($slide->publicado) && $slide->publicado == 'sim' ? 'selected': '')}}">Sim</option>
    </select>
        <label>Publicado:</label>
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
        <img src="{{asset($slide->imagem)}}" width="120">

    </div>

</div>  

@else
    <div class="row">
    <div class="file-field input-field col m12 s12">
        <div class="btn">
            <input type="file" multiple=" "name="imagens[]">
            arquivo
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate" >
        </div>

    </div>
    
@endif