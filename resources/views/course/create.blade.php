@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    <div class="col-md-offset-2 col-md-8">
        <h2>Cadastrar Curso</h2>
        
        @include('course._form')
    </div>
    
</div>
@endsection