@extends('.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="col-md-offset-2 col-md-8">
            <h2>Matricular Aluno</h2>

            @include('.enroll._form')
        </div>
    </div>
@endsection