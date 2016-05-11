@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('.user.helper._actions')
   
    <h2>#{{ $user->id }} - {{ $user->name }}</h2>
    <ul class="list-group col-md-6">
        <li class="list-group-item">Usuário: <strong>{{ $user->user }}</strong></li>
        <li class="list-group-item">E-mail: <strong>{{ $user->email }}</strong></li>
        <li class="list-group-item">Ano de ingresso no IFTM: <strong>{{ $user->ingress_year }}</strong></li>
        <li class="list-group-item">Privilégios de usuário: <strong>
            @if($user->type == 1)
                Aluno
            @elseif($user->type == 2)
                Professor
            @else
                Administrador
            @endif
            </strong>
        </li>
        @if($user->type == 1)
        <li class="list-group-item">Curso: <strong>{{ $user->course->name }}</strong></li>
        @endif
    </ul>

    <hr>
    
    @if($user->type != 3)

        @include('.user.helper._subject_table')

    @endif

    <hr>

    @include('.user.helper._maintenance')
</div>
@endsection