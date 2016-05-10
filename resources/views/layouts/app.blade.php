<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>__pst_IFTM</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body id="app-layout">
    <div class="page-wrap">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/home') }}">
                        __pst_IFTM
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    @if(!Auth::guest())
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li>{{ link_to_route('course.index', 'Cursos') }}</li>
                        <li>{{ link_to_route('subject.index', 'Disciplinas') }}</li>
                        <li>{{ link_to_route('user.index', 'Usuários') }}</li>
                        <li>{{ link_to_route('subject.project.index', 'Projetos', 1) }}</li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-off text-danger"></span> Sair</a></li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>

        <div class="container">
            @if (Auth::guest())
                @yield('content')
            @else 
            <div class="col-md-9">
                @yield('content')
            </div>
            <div class="col-md-3 profile">
                <h4 class="title">Dados de Conexão</h4>
                
                <ul class="user-data-profile">
                    <li class="user-data"><span class="topic">Nome: </span>Thiago Gois Lima</li>
                    <li class="user-data"><span class="topic">e-mail: </span>thiagogois@iftm.edu.br</li>
                    <li class="user-data"><span class="topic">Conta: </span>Professor</li>
                </ul>
            </div>
            @endif            
        </div>
    </div>
    
    <footer class="container-fluid site-footer">
        <div class="col-md-offset-2 col-md-3 footer-content">
            <p>Ajuda</p>
            <p>FAQ</p>
            <p>{{ link_to('http://www.iftm.edu.br/', 'Página principal do IFTM', array('target' => '_blank')) }}</p>
            <p>{{ link_to('https://virtualif.iftm.edu.br/', 'Virtual IFTM', array('target' => '_blank')) }}</p>
        </div>
        <div class="col-md-5 footer-content">
            <p>Plataforma de Submissão de Trabalhos</p>
            <p>__pst_IFTM</p>
            <p>Desenvolvido por: Thiago Gois</p>
            <p>
                {{ link_to('https://www.facebook.com/thiago.g.lima.1', 'facebook', array('target' => '_blank')) }} - 
                {{ link_to('https://twitter.com/thiagogoiis', 'twiter', array('target' => '_blank')) }} - 
                {{ link_to('https://www.youtube.com/channel/UCKxNWvf8VFwNt6Avd5aAiyg', 'youtube', array('target' => '_blank')) }}
            </p>
            <p>Plataforma desenvolvida com o framework {{ link_to('http://www.laravel.com', 'Laravel', array('target' => '_blank')) }}</p>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
    <!-- Scripts from third part -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    
    <!-- Scripts from the project -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
