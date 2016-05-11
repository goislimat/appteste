@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('.subject.helper._actions')
   
    <h2>#{{ $subject->id }} - {{ $subject->name }}</h2>
    <h5>Disciplina atualmente disponível no {{ $subject->semester }}º período/ano do curso de {{ $subject->course->name }}</h5>

    <div class="dynamic-content">
        @if(count($subject->users) == 0)
            <div class="bg-danger">
                <p><strong>NOTA: </strong>Essa disciplina ainda não possui nenhum aluno matriculado nesse período/ano. Para matricular um aluno, basta acessar o menu de <span class="bg-danger-invert">Ações</span> > <span class="bg-danger-invert">Matricular Aluno</span>.</p>
            </div>
        @else

             @if($subject->teacher != null)
                 <h4>Lecionada por: {{ link_to_route('user.show', $subject->teacher->name, $subject->teacher->id) }}</h4>
             @else
                <div class="bg-danger">
                    <p><strong>NOTA: </strong>Essa disciplina não possui professor nesse período. Para cadastrar um professor, basta acessar o menu de <span class="bg-danger-invert">Ações</span> > <span class="bg-danger-invert">Cadastrar Professor</span>.</p>
                </div>
             @endif

            <h3 class="optional-slide">
                Alunos matriculados em {{ $subject->name }} em {{ $subject->users[0]->pivot->year_semester }}
                <button class="btn btn-link"><span class="glyphicon glyphicon-chevron-down"></span></button>
            </h3>

            <div class="optional optional-hide">
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>Ano de Ingresso</td>
                            <td>Desvencilhar</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subject->users as $user)
                            <tr>
                                <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('user.show', $user->name, $user->id) }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->ingress_year }}</td>
                                <td>
                                    {{ Form::open(array('route' => array('enroll.destroy', $subject->id, $user->id, str_replace('/', '_', $user->pivot->year_semester)), 'method' => 'delete', 'class' => 'form-delete')) }}
                                    <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <hr>

    @include('.subject.helper._maintenance')
</div>
@endsection