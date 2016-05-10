@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('course.helper._actions')
    
    <h2>#{{ $course->id }} - {{ $course->name }}</h2>
    <h4>{{ $course->type }}</h4>
    
    @if(count($course->subjects) == 0)
        <div class="bg-danger">
            <p><strong>NOTA: </strong>Esse curso ainda não possui nenhuma disciplina vinculada.</p>
            <p>Para cadastrar uma nova disciplina, basta acessar o menu de ações.</p>
        </div>
    @else
    
        <h3 class="optional-slide">
            Grade curricular cadastrada para o curso de {{ $course->name }}
            <button class="btn btn-link"><span class="glyphicon glyphicon-chevron-down"></span></button>
        </h3>

        <div class="optional">
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <td>Disciplina</td>
                        <td>Semestre</td>
                    </tr>
                </thead>
                @foreach($course->subjects as $subject)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span>{{ link_to_route('subject.show', $subject->name, array($subject->id)) }}</td>
                        <td>{{ $subject->semester }}º</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    <hr>

    @if(count($course->users) == 0)
        <div class="bg-danger">
            <p><strong>NOTA: </strong>Esse curso ainda não possui nenhum usuário vinculado.</p>
            <p>Para cadastrar um novo usuário, basta acessar o menu de ações.</p>
        </div>
    @else
        <h3 class="optional-slide">
            Alunos cadastrados no curso {{ $course->name }}
            <button class="btn btn-link"><span class="glyphicon glyphicon-chevron-down"></span></button>
        </h3>

        <div class="optional">
            <table class="table table-condensed table-hover">
                <thead>
                <tr>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Ano de ingresso</td>
                    <td>Usuário</td>
                </tr>
                </thead>
                @foreach($course->users as $user)
                    <tr>
                        <td><span class="glyphicon glyphicon-link"></span>{{ link_to_route('user.show', $user->name, array($user->id)) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->ingress_year }}</td>
                        <td>{{ $user->username }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif

    <hr>

    @include('course.helper._maintenance')
</div>
@endsection