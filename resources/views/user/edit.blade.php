@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-offset-2 col-md-8">
        <h2>Editar Usuário</h2>
        
        @include('user._form')
    </div>
</div>
@endsection