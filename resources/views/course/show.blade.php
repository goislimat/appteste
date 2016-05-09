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
                    <li>{{ link_to_route('course.edit', 'Editar', $course->id, array()) }}</li>
                    <li role="separator" class="divider"></li>
                    <li>
                        {{ Form::open(array('route' => array('course.destroy', $course->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                            {{ Form::submit('Excluir', array('class' => 'btn btn-danger btn-sm col-md-offset-1 col-md-10')) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <h2>#{{ $course->id }} - {{ $course->name }}</h2>
    <h4>{{ $course->type }}</h4>
    
    @if(count($course->subjects) == 0)
    
    <p class="bg-danger"><strong>NOTA: </strong>Esse curso ainda não possui nenhuma disciplina vinculada.</p>
    
    @else
    
    <h3>Grade curricular cadastrada para o curso de Ciências da Computação</h3>
    
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <td>Disciplina</td>
                <td>Semestre</td>
            </tr>
        </thead>
        @foreach($course->subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->semester }}º</td>
            </tr>
        @endforeach
    </table>
    
    @endif
    
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Informações de Manutenção</h3>
        </div>
        <div class="panel-body">
            <p>Curso criado em: <strong>{{ date_format($course->created_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($course->created_at, 'H:i:s') }}</strong></p>
            <p>Dados Atualizados pela última vez em: <strong>{{ date_format($course->updated_at, 'd/m/Y') }}</strong> às <strong>{{ date_format($course->updated_at, 'H:i:s') }}</strong></p>
        </div>
    </div>
</div>

<script>
    $(document).on('submit', '.form-delete', function() {
        return confirm('Tem certeza que deseja excluir esse curso?');
    });
</script>
@endsection