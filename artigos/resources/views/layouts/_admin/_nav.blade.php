<nav>
    <div class="nav-wrapper black">
        <div class="container">
            <a href="{{route('admin.principal')}}" class="brand-logo">WPInfo - Sistema Administrativo</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">

                <li>@if(!Auth::guest())
                    Usuário:{{Auth::user()->name}}
                    <a href="{{route('admin.login.sair')}}" class="btn black">Sair</a>
                    @endif</li>
                <li>
                    <a href="#!" class="dropdown-button" data-activates="dropdown1">
                        Menu
                    </a>

                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="{{route('admin.principal')}}">Início</a></li>
                        <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
                        <li><a href="{{route('admin.paginas')}}">Paginas</a></li>
                        <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
                        <li><a href="{{route('admin.artigos')}}">Artigos</a></li>
                        <li><a href="{{route('admin.categorias')}}">Categorias</a></li>
                        <li><a href="{{route('admin.slides')}}">Slides</a></li>
                        
                    </ul>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="{{route('admin.principal')}}">Início</a></li>
                <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
                <li><a href="{{route('admin.paginas')}}">Paginas</a></li>
                <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
                <li><a href="{{route('admin.artigos')}}">Artigos</a></li>
                <li><a href="{{route('admin.categorias')}}">Categorias</a></li>
                <li><a href="{{route('admin.slides')}}">Slides</a></li>
                <li>@if(!Auth::guest())
                    Usuário {{Auth::user()->name}}
                    <a href="{{route('admin.login.sair')}}" class="btn black">Sair</a>
                    @endif</li>
            </ul>
        </div>
    </div>

</nav>