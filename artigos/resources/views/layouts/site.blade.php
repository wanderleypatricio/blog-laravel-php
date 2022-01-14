<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('lib/materialize/dist/css/materialize.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        
           
                @include('layouts._site._nav')
            
            <main>
                @if(Session::has('mensagem'))
                <div class="container">
                    <div class="row">
                        <div class="card {{Session::get('mensagem')['class']}}">
                            <div align="center" class="card-content">
                                {{Session::get('mensagem')['msg']}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @yield('content')
            </main>
        <footer class="page-footer blue">
          <div class="container">
            
          <div class="footer-copyright">
            <div class="container">
            © {{date('Y')}} Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">Desenvolvido por: Wanderley Patrício</a>
            </div>
          </div>
        </footer>
        <!-- Scripts -->
        <script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
        <script src="{{ asset('js/init.js') }}"></script>
    </body>
</html>
