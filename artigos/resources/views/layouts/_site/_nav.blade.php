
<nav>
                <div class="nav-wrapper black">
                    <div class="container">
                        <a href="{{route('site.home')}}" class="brand-logo">WPInfo</a>
                        <a href="#" data-activates="mobile-demo" class="button-collapse">
                            <i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="{{route('site.home')}}">Início</a></li>
                            <li><a href="{{route('site.sobre')}}">Sobre</a></li>
                            <li>
                            <a href="#" class="dropdown-button" data-activates="dropdown1">Artigos</a>

                                
                                <ul id="dropdown1" class="dropdown-content">
                                @foreach($categorias as $categoria)
                                <li><a href="{{route('site.artigos.categoria', $categoria->id)}}">{{$categoria->categoria}}</a></li>
                                @endforeach                        
                    </ul>
                            
                            </li>
                            <li><a href="{{route('site.contato')}}">Contato</a></li>
                            
                        </ul>

                        <ul class="side-nav" id="mobile-demo">
                            <li><a href="{{route('site.home')}}">Início</a></li>
                            <li><a href="{{route('site.sobre')}}">Sobre</a></li>
                            <li><a href="{{route('site.home')}}">Artigos</a></li>
                            <li><a href="{{route('site.contato')}}">Contato</a></li>
                        </ul>
                    </div>
                </div>
            </nav>