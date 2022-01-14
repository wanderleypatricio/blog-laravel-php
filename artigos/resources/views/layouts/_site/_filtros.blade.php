<div class="row">
    <form action="{{route('site.busca')}}" method="get">
        <div class="input-field col s6 m4">
            <select name="status">
                <option {{isset($busca['status']) && $busca['status'] == 'null' ? 'selected' : ''}} value="null">status do imóvel</option>
                <option value="aluga" {{isset($busca['status']) && $busca['status'] == 'aluga' ? 'selected' : ''}}>Aluga</option>
                <option {{isset($busca['status']) && $busca['status'] == 'vende' ? 'selected' : ''}} value="vende">Vende</option>
            </select>
            <label>
                status:
            </label>
        </div>
        <div class="input-field col s6 m4">
            <select name="tipo">
                <option {{isset($busca['tipo']) && $busca['tipo'] == 'null' ? 'selected' : ''}} value="null">Tipo do imóvel</option>
                @foreach($tipos as $tipo)
                <option {{isset($busca['tipo']) && $busca['tipo'] == $tipo->id ? 'selected' : ''}} value="{{$tipo->id}}">{{$tipo->titulo}}</option>
                @endforeach
            </select>
            <label>
                Tipo de Imóvel:
            </label>
        </div>
        <div class="input-field col s6 m4">
            <select name="cidade">
                <option {{isset($busca['cidade']) && $busca['cidade'] == 'null' ? 'selected' : ''}} value="null">Selecione a cidade</option>
                @foreach($cidades as $cidade)
                <option {{isset($busca['cidade']) && $busca['cidade'] == $cidade->id ? 'selected' : ''}} value="{{$cidade->id}}">{{$cidade->nome}}</option>
                @endforeach
            </select>
            <label>
                Cidades:
            </label>
        </div>
        <div class="input-field col s6 m3">
            <select name="dormitorios">
                <option {{isset($busca['dormitorios']) && $busca['dormitorios'] == '0' ? 'selected' : ''}} value="0">Dormitórios</option>
                <option {{isset($busca['dormitorios']) && $busca['dormitorios'] == '1' ? 'selected' : ''}} value="1">1</option>
                <option {{isset($busca['dormitorios']) && $busca['dormitorios'] == '2' ? 'selected' : ''}} value="2">2</option>
                <option {{isset($busca['dormitorios']) && $busca['dormitorios'] == '3' ? 'selected' : ''}} value="3">3</option>
                <option {{isset($busca['dormitorios']) && $busca['dormitorios'] == '4' ? 'selected' : ''}} value="4">4</option>
                <option {{isset($busca['dormitorios']) && $busca['dormitorios'] == '5' ? 'selected' : ''}} value="5">mais</option>
            </select>
            <label>
                Dormitórios:
            </label>
        </div>
        <div class="input-field col s12 m4">
            <select name="preco">
                <option {{isset($busca['preco']) && $busca['preco'] == '0' ? 'selected' : ''}} value="0">selecione o Valor desejado</option>
                <option {{isset($busca['preco']) && $busca['preco'] == '1' ? 'selected' : ''}} value="1">até R$500,00</option>
                <option {{isset($busca['preco']) && $busca['preco'] == '2' ? 'selected' : ''}} value="2">$500,00 a R$1.000,00</option>
                <option {{isset($busca['preco']) && $busca['preco'] == '3' ? 'selected' : ''}} value="3">$1.000,00 a R$5.000,00</option>
                <option {{isset($busca['preco']) && $busca['preco'] == '4' ? 'selected' : ''}} value="4">$5.000,00 a R$10.000,00</option>
            </select>
            <label>
                Valor:
            </label>
        </div>
        <div class="input-field col s12 m2">
            <button class="btn deep-orange darken-1 right">Filtrar</button>
        </div>
    </form>
</div>