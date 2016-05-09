@extends('app')

@section('content')
<div class="container-fluid">
    <nav class="navbar">
        <div class="nav navbar-nav navbar-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="glyphicon glyphicon-cog"></span> Ações
                </button>
                <ul class="dropdown-menu">
                    <li>{{ link_to_route('subject.edit', 'Editar', $subject->id, array()) }}</li>
                    <li role="separator" class="divider"></li>
                    <li>
                        {{ Form::open(array('route' => array('subject.destroy', $subject->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                            {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <h2>#{{ $subject->id }} - {{ $subject->name }}</h2>
    <h4>Disciplina atualmente disponível no {{ $subject->semester }}º período/ano do curso de {{ $subject->course->name }}</h4> 
    
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Informações de Manutenção</h3>
        </div>
        <div class="panel-body">
            <p>Disciplina criada em: <strong>{{ date_format($subject->created_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($subject->created_at, 'H:i:s') }}</strong></p>
            <p>Dados Atualizados pela última vez em: <strong>{{ date_format($subject->updated_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($subject->updated_at, 'H:i:s') }}</strong></p>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', '.form-delete', function() {
        return confirm('Tem certeza que deseja excluir essa disciplina?');
    });
</script>
@endsection