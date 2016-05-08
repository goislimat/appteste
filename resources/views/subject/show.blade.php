@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="subject-info col-md-9">
            <h2>#{{ $subject->id }} - {{ $subject->name }}</h2>
            <h4>Disciplina atualmente disponível no {{ $subject->semester }}º período/ano do curso de {{ $subject->course->name }}</h4>
        </div>
        
        <div class="actions col-md-3 row">
            {{ link_to_route('subject.edit', 'Editar', $subject->id, array('class' => 'btn btn-warning col-md-offset-4 col-md-4')) }}
            
            {{ Form::open(array('route' => array('subject.destroy', $subject->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                {{ Form::submit('Excluir', array('class' => 'btn btn-danger col-md-offset-4 col-md-4')) }}
            {{ Form::close() }}
        </div>
    </div>    
    
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