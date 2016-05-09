<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>__pst_IFTM</title>
        
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
        
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="wrapper">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">__pst_IFTM</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>{{ link_to_route('course.index', 'Cursos') }}</li>
                            <li>{{ link_to_route('subject.index', 'Disciplinas') }}</li>
                            <li>{{ link_to_route('user.index', 'Usuários') }}</li>
                            <li>{{ link_to_route('project.index', 'Projetos') }}</li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-off text-danger"></span> Sair</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            
            <div class="container">
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
            </div>
            
            <div class="push"></div>
        </div>
        
        <footer class="container-fluid">
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
    </body>
</html>