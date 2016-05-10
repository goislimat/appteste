@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-offset-2 col-md-8">
        <h2>Editar Disciplina</h2>
        
        @include('subject._form')
    </div>
</div>
@endsection