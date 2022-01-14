<div class="input-field">
<label>Código:</label>
   <input type="text" name="id" disabled class="validate "value="{{isset($artigo['id']) ? $artigo['id'] : ''}}">
    
</div>
<div class="row">
<div class="input-field">
    <label>
        Categorias:
    </label>
    <br>
    <select name="categoria_id">
    <option value="null">Selecione uma categoria</option>
    @foreach($categorias as $categoria)
        <option value="{{$categoria->id}}" {{(
                isset($artigo->categoria_id)&& $artigo->categoria_id == $categoria->id ? 'selected':'')}}>
                {{$categoria->categoria}}</option>
        @endforeach
    </select>
    
</div>
</div>
<div class="input-field">
<label>Titulo:</label>
   <input type="text" name="titulo" class="validate "value="{{isset($artigo['titulo']) ? $artigo['titulo'] : ''}}">
    
</div>
<div class="input-field">
<label>Escreva o texto do artigo:</label>
<br>
<br>
   <textarea name="texto" id="texto" class="validate ">{{isset($artigo['texto']) ? $artigo['texto'] : ''}}</textarea>
    
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'texto' );
</script>