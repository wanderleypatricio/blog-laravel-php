<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>

<div class="row section">
    <h3 align='center'>Artigos</h3>
    <div class="divider"></div>
    <br>
    
</div>

<div class="row section">
    @foreach($artigos as $artigo)

    <div class="col s12 m3" style="height: 400px;">
        <div class="card">
            <div class="card-image" style="height: 150px;">
                <a href="{{route('site.artigo',[$artigo->id, str_slug($artigo->titulo,'_')])}}">
                    <img src="{{asset($artigo->imagem)}}" alt="{{$artigo->titulo}}" width="100px">
                </a>
            </div>
            <div class="card-content" style="height: 200px; margin-top: 23px;">
                <p><b>{{$artigo->titulo}}</b></p>
                <p>{{$artigo->texto}}</p>
            </div>
            <div class="card-action" style="height: 50px;">
                <a href="{{route('site.artigo',[$artigo->id, str_slug($artigo->titulo,'_')])}}">Ver mais...</a>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
