<div class="input-field">
    <input type="text" name="nome" class="validate"value="{{isset($usuario->name)}}">
    <label>Nome:</label>
</div>
<div class="input-field">
    <input type="email" name="email" class="validate" value="{{isset($usuario->email)}}">
    <label>E-mail:</label>
</div>
<div class="input-field">
    <input type="password" name="password" class="validate">
    <label>Senha:</label>
</div>