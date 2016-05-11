@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('.subject.helper._actions')

        <h2>#{{ $subject->id }} - {{ $subject->name }}</h2>
        <h5>Disciplina atualmente disponível no {{ $subject->semester }}º período/ano do curso de {{ $subject->course->name }}</h5>

        <div class="dynamic-content">
            @if(count($subject->users) == 0)
                <div class="bg-danger">
                    @if($subject->user_type == 1)
                        <p><strong>NOTA: </strong>Essa disciplina ainda não possui nenhum aluno matriculado. Para matricular um aluno, basta acessar o menu de <span class="bg-danger-invert">Ações</span> > <span class="bg-danger-invert">Matricular Aluno</span>.</p>
                    @else
                        <p><strong>NOTA: </strong>Essa disciplina ainda não foi lecionada por nenhum professor. Para cadastrar um professor, basta acessar o menu de <span class="bg-danger-invert">Ações</span> > <span class="bg-danger-invert">Cadastrar Professor</span>.</p>
                    @endif
                </div>
            @else

                <h3 class="optional-slide">
                    Lista de todos os {{ ($subject->user_type == 1) ? 'alunos que já foram matriculados em' : 'professores que já lecionaram' }} {{ $subject->name }}
                    <button class="btn btn-link"><span class="glyphicon glyphicon-chevron-up"></span></button>
                </h3>

                <div class="optional">
                    <table class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Semestre</td>
                            <td>E-mail</td>
                            <td>Ano de Ingresso</td>
                            <td>Desvencilhar</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subject->users as $user)
                            <tr>
                                <td><span class="glyphicon glyphicon-link"></span> {{ link_to_route('user.show', $user->name, $user->id) }}</td>
                                <td>{{ $user->pivot->year_semester }}</td>
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